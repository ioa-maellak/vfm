<?php
/* @var $this VehicleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehicles',
);

$this->menu=array(
	array('label'=>'Create Vehicle', 'url'=>array('create')),
	array('label'=>'Manage Vehicle', 'url'=>array('admin')),
);
?>

<h1>Vehicles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
