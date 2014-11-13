<?php
/* @var $this SectorEkabController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sector Ekabs',
);

$this->menu=array(
	array('label'=>'Create SectorEkab', 'url'=>array('create')),
	array('label'=>'Manage SectorEkab', 'url'=>array('admin')),
);
?>

<h1>Sector Ekabs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
