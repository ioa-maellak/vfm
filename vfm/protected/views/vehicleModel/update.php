<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */

$this->breadcrumbs=array(
	'Vehicle Models'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleModel', 'url'=>array('index')),
	array('label'=>'Create VehicleModel', 'url'=>array('create')),
	array('label'=>'View VehicleModel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VehicleModel', 'url'=>array('admin')),
);
?>

<h1>Update VehicleModel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>