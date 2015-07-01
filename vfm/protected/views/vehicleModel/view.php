<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */

$this->breadcrumbs=array(
	'Vehicle Models'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List VehicleModel', 'url'=>array('index')),
	array('label'=>'Create VehicleModel', 'url'=>array('create')),
	array('label'=>'Update VehicleModel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VehicleModel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleModel', 'url'=>array('admin')),
);
?>

<h1>View VehicleModel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'model',
	),
)); ?>
