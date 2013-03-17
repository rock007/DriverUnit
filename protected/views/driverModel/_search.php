<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'driverName'); ?>
		<?php echo $form->textField($model,'driverName',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'secName'); ?>
		<?php echo $form->textField($model,'secName',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nation'); ?>
		<?php echo $form->textField($model,'nation',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel1'); ?>
		<?php echo $form->textField($model,'tel1',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel2'); ?>
		<?php echo $form->textField($model,'tel2',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel3'); ?>
		<?php echo $form->textField($model,'tel3',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carType'); ?>
		<?php echo $form->textField($model,'carType',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carID'); ?>
		<?php echo $form->textField($model,'carID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'driverYear'); ?>
		<?php echo $form->textField($model,'driverYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carSeat'); ?>
		<?php echo $form->textField($model,'carSeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carYear'); ?>
		<?php echo $form->textField($model,'carYear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carKm'); ?>
		<?php echo $form->textField($model,'carKm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address3'); ?>
		<?php echo $form->textField($model,'address3',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carPic'); ?>
		<?php echo $form->textField($model,'carPic',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'driverID'); ?>
		<?php echo $form->textField($model,'driverID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carPass'); ?>
		<?php echo $form->textField($model,'carPass',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carNum'); ?>
		<?php echo $form->textField($model,'carNum',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carLevel'); ?>
		<?php echo $form->textField($model,'carLevel',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suppUser'); ?>
		<?php echo $form->textField($model,'suppUser',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->