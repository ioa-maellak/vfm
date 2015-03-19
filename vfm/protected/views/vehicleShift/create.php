<?php
/* @var $this VehicleShiftController */
/* @var $model VehicleShift */

$this->breadcrumbs=array(
	
    Yii::t('strings', 'Vehicle Shifts')=>array('admin'),
    Yii::t('strings', 'Create'),
	
);

$this->menu=array(
	array('label'=>'List VehicleShift', 'url'=>array('index')),
	array('label'=>'Manage VehicleShift', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('strings', 'Create VehicleShift'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>