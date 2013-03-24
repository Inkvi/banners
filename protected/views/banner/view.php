<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Create Banner', 'url'=>array('create')),
	array('label'=>'Update Banner', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Banner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Banner', 'url'=>array('admin')),
);
?>

<h1>View Banner #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
    array(
      'name'=>'image',
      'label'=>'Image',
      'type'=>'raw',
      'value'=> CHtml::image(Yii::app()->request->baseUrl . '/banners/' . $model->image, "image", array("width" => 200))
    ),
		'weight',
		'views',
    'created:datetime',
    'showed:datetime:Showed last time'
	),
)); ?>
