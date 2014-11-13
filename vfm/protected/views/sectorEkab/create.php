<?php
/* @var $this SectorEkabController */
/* @var $model SectorEkab */

$this->breadcrumbs=array(
	'Sector Ekabs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SectorEkab', 'url'=>array('index')),
	array('label'=>'Manage SectorEkab', 'url'=>array('admin')),
);
?>

<h1>Create SectorEkab</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>