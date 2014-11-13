<?php
/* @var $this VehicleServiceController */
/* @var $model VehicleService */

$this->breadcrumbs=array(
	'Vehicle Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VehicleService', 'url'=>array('index')),
	array('label'=>'Create VehicleService', 'url'=>array('create')),
	array('label'=>'Update VehicleService', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VehicleService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleService', 'url'=>array('admin')),
);
?>

<h1>View VehicleService #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'service_status',
		'service_date',
		'description',
		'running_distance',
		'vehicle_part',
		'vehicle_part_quantity',
		'price',
		'invoice_number',
		'garage',
		'vehicle_id',
	),
)); ?>
