<?php
/* @var $this VehicleServiceController */
/* @var $model VehicleService */

$this->breadcrumbs=array(
	'Vehicle Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update VehicleService <?php echo $model->id; ?></h1>
<div class="form">
    
<?php 

$form=$this->beginWidget('CActiveForm', array(
'id'=>'default-parent-form',
'enableAjaxValidation'=>false,
'htmlOptions' => array('enctype' => 'multipart/form-data'),
));

echo $form->errorSummary(array($model));

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
'vehicle_parts'=>$vehicle_parts,
),
true),
);

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

));

 echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
	
$this->endWidget(); ?>

</div><!-- form -->

