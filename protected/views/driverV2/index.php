<?php
$this->breadcrumbs=array(
	'Driver V2s',
);

$this->menu=array(
	array('label'=>'Create DriverV2', 'url'=>array('create')),
	array('label'=>'Manage DriverV2', 'url'=>array('admin')),
);
?>

<h1>Driver V2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
