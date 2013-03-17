<?php
$this->breadcrumbs=array(
	'Driver Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DriverModel', 'url'=>array('index')),
	array('label'=>'Manage DriverModel', 'url'=>array('admin')),
);
?>

<h1>Create DriverModel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>