<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('driverId')); ?>:</b>
	<?php echo CHtml::encode($data->driverId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('line')); ?>:</b>
	<?php echo CHtml::encode($data->line); ?>
	<br />


</div>