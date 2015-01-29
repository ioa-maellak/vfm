<?php
/* @var $this VehicleShiftController */
/* @var $model VehicleShift */

$this->breadcrumbs=array(
	'Vehicle Shifts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VehicleShift', 'url'=>array('index')),
	array('label'=>'Create VehicleShift', 'url'=>array('create')),
	array('label'=>'Update VehicleShift', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VehicleShift', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleShift', 'url'=>array('admin')),
);
?>

<h1>View VehicleShift #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                'vehicle_id',
		'shift_start_km',
		'shift_end_km',
		'shift_used_fuel',
		'shift_start_datetime',
		'shift_end_datetime',
	),
)); ?>
