<?php
/* @var $this VehicleShiftController */
/* @var $model VehicleShift */

$this->breadcrumbs=array(
	'Vehicle Shifts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleShift', 'url'=>array('index')),
	array('label'=>'Create VehicleShift', 'url'=>array('create')),
	array('label'=>'View VehicleShift', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VehicleShift', 'url'=>array('admin')),
);
?>

<h1>Update VehicleShift <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>