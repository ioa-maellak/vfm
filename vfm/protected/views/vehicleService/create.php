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
'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false, 'beforeValidate' => 'js:beforeValidate'),
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
),
true),
);
//$tabs_disabled = array(1);
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
           // 'disabled' => $tabs_disabled,
	 ),
  
     //'cssFile' => Yii::app()->baseUrl . '/vfm/css/main.css',


));


	 echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
          
	 
$this->endWidget(); ?>
    

</div><!-- form -->


<?php
$js=<<<EOJ
function beforeValidate() {
       var i=true;
      if($("#vehicle_id").val() === "")  i=false;
       if(i===false)
                alert("Error: You must select a vehicle!");
        return i;
        }
EOJ;
Yii::app()->clientScript->registerScript('beforeValidate', $js);
?>
        