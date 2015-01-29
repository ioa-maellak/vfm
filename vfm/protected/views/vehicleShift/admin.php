<?php
/* @var $this VehicleShiftController */
/* @var $model VehicleShift */

$this->breadcrumbs=array(
	'Vehicle Shifts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VehicleShift', 'url'=>array('index')),
	array('label'=>'Create VehicleShift', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vehicle-shift-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vehicle Shifts</h1>

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
	'id'=>'vehicle-shift-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                'vehicle_id',
		'shift_start_km',
		'shift_end_km',
		'shift_used_fuel',
		'shift_start_datetime',
		'shift_end_datetime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
