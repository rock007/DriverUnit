<?php
$this->breadcrumbs=array(
	'Driver Lines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DriverLine', 'url'=>array('index')),
	array('label'=>'Manage DriverLine', 'url'=>array('admin')),
);
?>

<h1>Create DriverLine</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>