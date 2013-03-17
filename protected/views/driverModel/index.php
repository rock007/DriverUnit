<?php
$this->breadcrumbs=array(
	'Driver Models',
);

$this->menu=array(
	array('label'=>'Create DriverModel', 'url'=>array('create')),
	array('label'=>'Manage DriverModel', 'url'=>array('admin')),
);
?>

<h1>Driver Models</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
