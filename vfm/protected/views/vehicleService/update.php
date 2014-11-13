<?php
/* @var $this VehicleServiceController */
/* @var $model VehicleService */

$this->breadcrumbs=array(
	'Vehicle Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleService', 'url'=>array('index')),
	array('label'=>'Create VehicleService', 'url'=>array('create')),
	array('label'=>'View VehicleService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VehicleService', 'url'=>array('admin')),
);
?>

<h1>Update VehicleService <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>