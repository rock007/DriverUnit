<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'driver-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carType'); ?>
		<?php echo $form->textField($model,'carType',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'carType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'line'); ?>
		<?php echo $form->textField($model,'line',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'line'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carYear'); ?>
		<?php echo $form->textField($model,'carYear'); ?>
		<?php echo $form->error($model,'carYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>
		<?php echo $form->textField($model,'start'); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ads'); ?>
		<?php echo $form->textField($model,'ads',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ads'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createDt'); ?>
		<?php echo $form->textField($model,'createDt'); ?>
		<?php echo $form->error($model,'createDt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->