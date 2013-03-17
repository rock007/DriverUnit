<?php
$this->breadcrumbs=array(
	'Driver Models'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DriverModel', 'url'=>array('index')),
	array('label'=>'Create DriverModel', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('driver-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Driver Models</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'driver-model-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'driverName',
		'secName',
		'nation',
		'tel1',
		'tel2',
		/*
		'tel3',
		'sex',
		'carType',
		'carID',
		'driverYear',
		'carSeat',
		'carYear',
		'carKm',
		'province',
		'address',
		'address1',
		'address2',
		'address3',
		'carPic',
		'driverID',
		'carPass',
		'carNum',
		'carLevel',
		'suppUser',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
