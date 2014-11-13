<?php
/* @var $this SectorEkabController */
/* @var $model SectorEkab */

$this->breadcrumbs=array(
	'Sector Ekabs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SectorEkab', 'url'=>array('index')),
	array('label'=>'Create SectorEkab', 'url'=>array('create')),
	array('label'=>'View SectorEkab', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SectorEkab', 'url'=>array('admin')),
);
?>

<h1>Update SectorEkab <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>