<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* @var $this VehicleController */
/* @var $model Vehicle */

$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Manage Vehicle', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vehicle-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vehicles</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vehicle-grid',
	'dataProvider'=>$model->searchVehicleForService(),
	//'filter'=>$model,
	'columns'=>array(
		    'sectorEkab.name',
                    'license_plate',
                    'running_distance',
                    'nextservice_km',
		array(
			'class'=>'CButtonColumn',
                    'template'=>'{update} {delete}',
		),
	),
)); ?>
