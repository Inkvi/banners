<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs = array(
  'Banners' => array('index'),
  'Manage',
);

$this->menu = array(
  array('label' => 'List Banner', 'url' => array('index')),
  array('label' => 'Create Banner', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Banners</h1>

<?php echo CHtml::link('Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
  <?php $this->renderPartial('_search', array(
    'model' => $model,
  )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id' => 'banner-grid',
  'dataProvider' => $model->search(),
  'columns' => array(
    'id',
    'title',
    array(
      'name' => 'thumb',
      'type' => 'raw',
    ),
    'weight',
    'views',
    'created:datetime',
    'showed:datetime',
    array(
      'class' => 'CButtonColumn',
    ),
  ),
)); ?>
