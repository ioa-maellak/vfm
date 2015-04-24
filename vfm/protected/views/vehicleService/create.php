<?php
/* @var $this VehicleServiceController */
/* @var $model VehicleService */

$this->breadcrumbs=array(
	'Vehicle Services'=>array('index'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List VehicleService', 'url'=>array('index')),
//	array('label'=>'Manage VehicleService', 'url'=>array('admin')),/
//);
?>

<h1>Create VehicleService</h1>
<div class="form">

<?php 
$form=$this->beginWidget('CActiveForm', array(
'id'=>'default-parent-form',
'enableAjaxValidation'=>true,
'htmlOptions' => array('enctype' => 'multipart/form-data'),
));

echo $form->errorSummary(array($model,$partsmodel));

$tabs = array();

$tabs['Service'] = array(
'id'=>'dataServiceTab',
'content'=>$this->renderPartial('_formservice', array(
'form' => $form,
'model'=>$model,
),
true),
);
$tabs['Service Parts'] = array(
'id'=>'dataServicePartsTab',
'content'=>$this->renderPartial('_formserviceparts', array(
'form' => $form,
'partsmodel'=>$partsmodel,
//'items'=>$items,
),
true),
);
/*
$tabs['Service Parts'] = array(
'id'=>'dataServicePartsTab',
'content'=>$this->renderPartial('_formserviceparts', array(
'form' => $form,
'partsmodel'=>$partsmodel,
),
true),
);*/
//$tabs['Parts'] = array(
//'id'=>'dataPartsTab',
//'content'=>$this->renderPartial('createsp', array(
//'form' => $form,
//'partsmodel'=>$partsmodel,
//),
//true),
//);

$this->widget('zii.widgets.jui.CJuiTabs', array(
'tabs' => $tabs,
'options'=>array(
               'collapsible' => false,
	    'selected'=>isset(Yii::app()->session['tabid'])?Yii::app()->session['tabid']:0,
	    'select'=>'js:function(event, ui) { 
	            var index=ui.index;
	            $.ajax({
	                "url":"'.Yii::app()->createUrl('site/tabidsession').'",
	                "data":"tab="+index,
	            });
	    }',
	 ),
  
     //'cssFile' => Yii::app()->baseUrl . '/vfm/css/main.css',


));


		 echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
	
$this->endWidget(); ?>

</div><!-- form -->

