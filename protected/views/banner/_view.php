<?php
/* @var $this BannerController */
/* @var $data Banner */
?>

<div class="view">

  <div class="left">
    <div>
      <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
      <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    </div>
    <div>
      <b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
      <?php echo CHtml::encode($data->weight); ?>
    </div>
    <div>
      <b><?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:</b>
      <?php echo CHtml::encode($data->views); ?>
    </div>
    <div>
      <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
      <?php echo date('j/m/Y H:i:s', $data->created); ?>
    </div>
    <div>
      <b><?php echo CHtml::encode($data->getAttributeLabel('showed')); ?>:</b>
      <?php echo date('j/m/Y H:i:s', $data->showed); ?>
    </div>
  </div>
  <div class="right">
    <?php echo $data->thumb; ?>
  </div>
  <div class="clear"></div>


</div>