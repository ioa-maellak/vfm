<?php
/* @var $this VehiclePartsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vehicle Parts',
);

$this->menu=array(
	array('label'=>'Create VehicleParts', 'url'=>array('create')),
	array('label'=>'Manage VehicleParts', 'url'=>array('admin')),
);
?>

<h1>Vehicle Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
