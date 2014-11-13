<?php
/* @var $this VehicleServiceController */
/* @var $model VehicleService */

$this->breadcrumbs=array(
	'Vehicle Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleService', 'url'=>array('index')),
	array('label'=>'Manage VehicleService', 'url'=>array('admin')),
);
?>

<h1>Create VehicleService</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>