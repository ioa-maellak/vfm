<?php
/* @var $this VehicleShiftController */
/* @var $model VehicleShift */

$this->breadcrumbs=array(
	'Vehicle Shifts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleShift', 'url'=>array('index')),
	array('label'=>'Manage VehicleShift', 'url'=>array('admin')),
);
?>

<h1>Create VehicleShift</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>