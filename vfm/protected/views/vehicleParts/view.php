<?php
/* @var $this VehiclePartsController */
/* @var $model VehicleParts */

$this->breadcrumbs=array(
	'Vehicle Parts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List VehicleParts', 'url'=>array('index')),
	array('label'=>'Create VehicleParts', 'url'=>array('create')),
	array('label'=>'Update VehicleParts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VehicleParts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleParts', 'url'=>array('admin')),
);
?>

<h1>View VehicleParts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
