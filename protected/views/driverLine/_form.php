<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'line-form',
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
		<?php echo $form->labelEx($model,'startAddress'); ?>
		<?php echo $form->textField($model,'startAddress',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'startAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endAddress'); ?>
		<?php echo $form->textField($model,'endAddress',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'endAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interval'); ?>
		<?php echo $form->textField($model,'interval'); ?>
		<?php echo $form->error($model,'interval'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des'); ?>
		<?php echo $form->textField($model,'des',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->