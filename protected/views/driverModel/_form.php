<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'driver-model-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'driverName'); ?>
		<?php echo $form->textField($model,'driverName',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'driverName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'secName'); ?>
		<?php echo $form->textField($model,'secName',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'secName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nation'); ?>
		<?php echo $form->textField($model,'nation',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel1'); ?>
		<?php echo $form->textField($model,'tel1',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tel1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel2'); ?>
		<?php echo $form->textField($model,'tel2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tel2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel3'); ?>
		<?php echo $form->textField($model,'tel3',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tel3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carType'); ?>
		<?php echo $form->textField($model,'carType',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'carType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carID'); ?>
		<?php echo $form->textField($model,'carID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'carID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'driverYear'); ?>
		<?php echo $form->textField($model,'driverYear'); ?>
		<?php echo $form->error($model,'driverYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carSeat'); ?>
		<?php echo $form->textField($model,'carSeat'); ?>
		<?php echo $form->error($model,'carSeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carYear'); ?>
		<?php echo $form->textField($model,'carYear'); ?>
		<?php echo $form->error($model,'carYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carKm'); ?>
		<?php echo $form->textField($model,'carKm'); ?>
		<?php echo $form->error($model,'carKm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address3'); ?>
		<?php echo $form->textField($model,'address3',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'address3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carPic'); ?>
		<?php echo $form->textField($model,'carPic',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'carPic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'driverID'); ?>
		<?php echo $form->textField($model,'driverID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'driverID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carPass'); ?>
		<?php echo $form->textField($model,'carPass',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'carPass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carNum'); ?>
		<?php echo $form->textField($model,'carNum',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'carNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carLevel'); ?>
		<?php echo $form->textField($model,'carLevel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'carLevel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suppUser'); ?>
		<?php echo $form->textField($model,'suppUser',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'suppUser'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->