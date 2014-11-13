<?php
/* @var $this VehicleServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehicle Services',
);

$this->menu=array(
	array('label'=>'Create VehicleService', 'url'=>array('create')),
	array('label'=>'Manage VehicleService', 'url'=>array('admin')),
);
?>

<h1>Vehicle Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
