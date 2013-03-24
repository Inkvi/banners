<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Create Banner', 'url'=>array('create')),
	array('label'=>'View Banner', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Banner', 'url'=>array('admin')),
);
?>

<h1>Update Banner <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>