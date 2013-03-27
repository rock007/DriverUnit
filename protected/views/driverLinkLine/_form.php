<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'driver-line-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'driverId'); ?>
		<?php echo $form->textField($model,'driverId'); ?>
		<?php echo $form->error($model,'driverId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'line'); ?>
		<?php echo $form->textField($model,'line'); ?>
		<?php echo $form->error($model,'line'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->