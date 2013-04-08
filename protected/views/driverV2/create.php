<?php
$this->breadcrumbs=array(
	'Driver V2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DriverV2', 'url'=>array('index')),
	array('label'=>'Manage DriverV2', 'url'=>array('admin')),
);
?>

<h1>添加司机信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>