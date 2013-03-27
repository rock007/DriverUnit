<?php
$this->breadcrumbs=array(
	'Driver Lines',
);

$this->menu=array(
	array('label'=>'Create DriverLine', 'url'=>array('create')),
	array('label'=>'Manage DriverLine', 'url'=>array('admin')),
);
?>

<h1>Driver Lines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
