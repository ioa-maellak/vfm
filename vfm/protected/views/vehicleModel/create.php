<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */

$this->breadcrumbs=array(
	'Vehicle Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleModel', 'url'=>array('index')),
	array('label'=>'Manage VehicleModel', 'url'=>array('admin')),
);
?>

<h1>Create VehicleModel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>