<?php
$this->breadcrumbs=array(
	'Lines'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Line', 'url'=>array('index')),
	array('label'=>'Create Line', 'url'=>array('create')),
	array('label'=>'View Line', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Line', 'url'=>array('admin')),
);
?>

<h1>Update Line <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>