<?php
/* @var $this VehiclePartsController */
/* @var $model VehicleParts */

$this->breadcrumbs=array(
	'Vehicle Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleParts', 'url'=>array('index')),
	array('label'=>'Manage VehicleParts', 'url'=>array('admin')),
);
?>

<h1>Create VehicleParts</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>