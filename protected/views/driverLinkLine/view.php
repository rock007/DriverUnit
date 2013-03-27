<?php
$this->breadcrumbs=array(
	'Driver Lines'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DriverLine', 'url'=>array('index')),
	array('label'=>'Create DriverLine', 'url'=>array('create')),
	array('label'=>'Update DriverLine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DriverLine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DriverLine', 'url'=>array('admin')),
);
?>

<h1>View DriverLine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'driverId',
		'line',
	),
)); ?>
