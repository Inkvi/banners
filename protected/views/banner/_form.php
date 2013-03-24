<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

  <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'banner-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
  )); ?>

  <p class="note">Fields with <span class="required">*</span> are required.</p>

  <?php echo $form->errorSummary($model); ?>

  <div class="row">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php echo $form->textField($model, 'title'); ?>
    <?php echo $form->error($model, 'title'); ?>
  </div>

  <div class="row">
    <?php if ($model->image): ?>
      <p><?php echo CHtml::encode($model->image); ?></p>
    <?php endif; ?>

    <?php echo $form->labelEx($model, 'image'); ?>
    <?php echo $form->fileField($model, 'image'); ?>
    <?php echo $form->error($model, 'image'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'weight'); ?>
    <?php echo $form->textField($model, 'weight'); ?>
    <?php echo $form->error($model, 'weight'); ?>
  </div>

  <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
  </div>

  <?php $this->endWidget(); ?>

</div><!-- form -->