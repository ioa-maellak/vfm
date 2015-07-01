<?php
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
		//'id',
            //'sector_ekab_id',
            'sectorEkab.name',
            'license_plate',
	    'running_distance',
            //'manufacture_date',
	//	'registration_date',
                'nextservice_km',
	//	'status',
		/*
		'vehicle_type',
		
		*/
            
		array(
			'class'=>'CButtonColumn',
                    'template'=>'{update} {delete}',
		),
	),
)); ?>

