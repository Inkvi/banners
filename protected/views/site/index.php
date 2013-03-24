<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php
if ($model)
{
  echo CHtml::image(Yii::app()->params['bannersDir'] . $model->image, "", array('width' => '100%'));
}
else
{
  echo "There are no banners to show.</br>";
  echo "You can add them " . CHtml::link('here', array('/banner/create'));
}
?>