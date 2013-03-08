<?php
$this->breadcrumbs=array(
	'路线',
);

$this->menu=array(
	array('label'=>'新增路线', 'url'=>array('create')),
	array('label'=>'管理路线', 'url'=>array('admin')),
);
?>

<h1>Lines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
