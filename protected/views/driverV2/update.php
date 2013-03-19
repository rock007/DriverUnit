<?php
$this->breadcrumbs=array(
	'Driver V2s'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DriverV2', 'url'=>array('index')),
	array('label'=>'Create DriverV2', 'url'=>array('create')),
	array('label'=>'View DriverV2', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage DriverV2', 'url'=>array('admin')),
);
?>

<h1>Update DriverV2 <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>