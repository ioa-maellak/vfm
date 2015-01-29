<?php
/* @var $this VehicleShiftController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehicle Shifts',
);

$this->menu=array(
	array('label'=>'Create VehicleShift', 'url'=>array('create')),
	array('label'=>'Manage VehicleShift', 'url'=>array('admin')),
);
?>

<h1>Vehicle Shifts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
