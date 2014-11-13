<?php
/* @var $this SectorEkabController */
/* @var $model SectorEkab */

$this->breadcrumbs=array(
	'Sector Ekabs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SectorEkab', 'url'=>array('index')),
	array('label'=>'Create SectorEkab', 'url'=>array('create')),
	array('label'=>'Update SectorEkab', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SectorEkab', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SectorEkab', 'url'=>array('admin')),
);
?>

<h1>View SectorEkab #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'description',
	),
)); ?>
