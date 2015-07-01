<?php
/* @var $this VehicleModelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehicle Models',
);

$this->menu=array(
	array('label'=>'Create VehicleModel', 'url'=>array('create')),
	array('label'=>'Manage VehicleModel', 'url'=>array('admin')),
);
?>

<h1>Vehicle Models</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
