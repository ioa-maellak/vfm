<?php
/* @var $this VehiclePartsController */
/* @var $model VehicleParts */

$this->breadcrumbs=array(
	'Vehicle Parts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List VehicleParts', 'url'=>array('index')),
	array('label'=>'Create VehicleParts', 'url'=>array('create')),
	array('label'=>'View VehicleParts', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VehicleParts', 'url'=>array('admin')),
);
?>

<h1>Update VehicleParts <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>