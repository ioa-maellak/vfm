<?php
/* @var $this VehicleShiftController */
/* @var $model VehicleShift */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-shift-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
	

)); ?>

	<p class="note"><?php echo Yii::t('strings', 'Fields with <span class="required">*</span> are required.'); ?></p>

        <?php echo $form->errorSummary($model); ?>
        <?php if ($this->getAction()->id == 'create'): ?>
            <div class="row">
            <?php echo $form->labelEx($model,'shift_start_datetime'); ?>
            <?php echo $form->textField($model,'shift_start_datetime', array('size'=>25, 'readonly'=>true)); ?>
            <?php echo $form->error($model,'shift_start_datetime'); ?>
            </div>
        <?php elseif ($this->getAction()->id == 'update'): ?>
            <div class="row">
            <?php echo $form->labelEx($model,'shift_end_datetime'); ?>
            <?php echo $form->textField($model,'shift_end_datetime', array('size'=>25, 'readonly'=>true)); ?>
            <?php echo $form->error($model,'shift_end_datetime'); ?>
            </div>
        <?php endif; ?>
              
        <div class="row">
            <?php echo $form->labelEx($model,'vehicle_id'); ?>
            <?php if ($this->getAction()->id == 'update'): ?>
                <?php echo $form->textField($model,'vehicle_license_plate', array('readonly'=>true)); ?>
            <?php elseif ($this->getAction()->id == 'create'): ?>
                
                <?php $user_sector = Yii::app()->user->sector_id;
                       if ($user_sector == 0){
                           echo $form->dropDownList($model,'vehicle_id',CHtml::listData(Vehicle::model()->findAll(), 'id', 'license_plate'), array('empty' => Yii::t('strings','Select a vehicle'), 'id'=>'vehicle_id',
                                               'ajax' =>
                                                array('type' => 'POST',
                                                   'url' => CController::createUrl('CheckNextService'),
                                                   'update' => '#service_alert',)));  
                       }
                       elseif ($user_sector !== 0) {
                           
                       
                      echo $form->dropDownList($model,'vehicle_id',CHtml::listData(Vehicle::model()->findAll(array(
                                               'condition'=>'sector_ekab_id = :sector_ekab_id',
                                               'params'=>array(':sector_ekab_id' => $user_sector))), 'id', 'license_plate'), array('empty' => 'Select a vehicle', 'id'=>'vehicle_id',
                                               'ajax' =>
                                                array('type' => 'POST',
                                                   'url' => CController::createUrl('CheckNextService'),
                                                   'update' => '#service_alert',)));
                       }
                      ?>      
                
                <div style="color: #ff0000" id="service_alert">
                     <?php //To display the next service alert. ?>  
                </div>
            <?php endif; ?>
            <?php echo $form->error($model,'vehicle_id'); ?>
	</div>
        
	<div class="row">
            <?php echo $form->labelEx($model,'shift_start_km'); ?>
        <?php if ($this->getAction()->id == 'update'): ?>
            <?php echo $form->textField($model, 'shift_start_km', array('readonly'=>true));?>
 	<?php else: ?>
            <?php echo $form->textField($model, 'shift_start_km', array('readonly'=>false));?>
  
        <?php endif; ?>
            <?php echo $form->error($model,'shift_start_km'); ?>
	</div>
        <?php if(Yii::app()->controller->action->id!='create') { ?>
            <div class="row">
                <?php echo $form->labelEx($model,'shift_end_km'); ?>
            <?php if ($this->getAction()->id == 'create'): ?>
                <?php echo $form->textField($model,'shift_end_km', array('readonly'=>true)); ?>
            <?php elseif ($this->getAction()->id == 'update'): ?>
                <?php echo $form->textField($model, 'shift_end_km', array('readonly'=>false));?>
            <?php endif; ?>
                <?php echo $form->error($model,'shift_end_km'); ?>
            </div>
        
            <div class="row">
                <?php echo $form->labelEx($model,'shift_used_fuel'); ?>
            <?php if ($this->getAction()->id == 'create'): ?>
                <?php echo $form->textField($model,'shift_used_fuel', array('readonly'=>true)); ?>
            <?php elseif ($this->getAction()->id == 'update'): ?>
                <?php echo $form->textField($model, 'shift_used_fuel', array('readonly'=>false));?>
            <?php endif; ?>
                <?php echo $form->error($model,'shift_used_fuel'); ?>
               
            </div>
         <?php } ?>
	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('strings', 'Create') : Yii::t('strings', 'Save'));?>
	</div>
       
<?php $this->endWidget(); ?>

</div><!-- form -->
