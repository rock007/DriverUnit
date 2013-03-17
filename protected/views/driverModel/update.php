<?php
$this->breadcrumbs=array(
	'Driver Models'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DriverModel', 'url'=>array('index')),
	array('label'=>'Create DriverModel', 'url'=>array('create')),
	array('label'=>'View DriverModel', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage DriverModel', 'url'=>array('admin')),
);
?>

<h1>Update DriverModel <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>