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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->errorSummary($model); ?>
        <h3 align="centre">
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
        </h3>
        
        <div class="row">
            <?php echo $form->labelEx($model,'vehicle_id'); ?>
        <?php if ($this->getAction()->id == 'update'): ?>
            <?php echo $form->textField($model,'vehicle_id', array('readonly'=>true)); ?>
            <?php elseif ($this->getAction()->id == 'create'): ?>
		<?php echo $form->dropDownList($model,'vehicle_id', CHtml::listData(Vehicle::model()->findAll(), 'id', 'license_plate'), array('empty' => 'Select a vehicle', 'options' => array('id'=>  array('selected' => true),))); ?>
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
          
	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->