<?php
$this->breadcrumbs=array(
	'路线'=>array('index'),
	'添加',
);

$this->menu=array(
	array('label'=>'路线', 'url'=>array('index')),
	array('label'=>'管理路线', 'url'=>array('admin')),
);
?>

<h1>添加路线</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>