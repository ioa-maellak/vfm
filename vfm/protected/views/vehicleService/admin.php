<?php
/* @var $this VehicleServiceController */
/* @var $model VehicleService */

$this->breadcrumbs=array(
	'Vehicle Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VehicleService', 'url'=>array('index')),
	array('label'=>'Create VehicleService', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vehicle-service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vehicle Services</h1>

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
	'id'=>'vehicle-service-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'service_status',
		'service_date',
		'description',
		'running_distance',
		'vehicle_part',
		/*
		'vehicle_part_quantity',
		'price',
		'invoice_number',
		'garage',
		'vehicle_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
