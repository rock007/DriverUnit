<?php
$this->breadcrumbs=array(
	'Driver Models'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List DriverModel', 'url'=>array('index')),
	array('label'=>'Create DriverModel', 'url'=>array('create')),
	array('label'=>'Update DriverModel', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete DriverModel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DriverModel', 'url'=>array('admin')),
);
?>

<h1>View DriverModel #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'driverName',
		'secName',
		'nation',
		'tel1',
		'tel2',
		'tel3',
		'sex',
		'carType',
		'carID',
		'driverYear',
		'carSeat',
		'carYear',
		'carKm',
		'province',
		'address',
		'address1',
		'address2',
		'address3',
		'carPic',
		'driverID',
		'carPass',
		'carNum',
		'carLevel',
		'suppUser',
	),
)); ?>
