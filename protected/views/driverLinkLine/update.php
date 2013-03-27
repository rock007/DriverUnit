<?php
$this->breadcrumbs=array(
	'Driver Lines'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DriverLine', 'url'=>array('index')),
	array('label'=>'Create DriverLine', 'url'=>array('create')),
	array('label'=>'View DriverLine', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DriverLine', 'url'=>array('admin')),
);
?>

<h1>Update DriverLine <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>