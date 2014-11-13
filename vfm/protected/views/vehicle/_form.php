<?php
/* @var $this VehicleController */
/* @var $model Vehicle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'license_plate'); ?>
		<?php echo $form->textField($model,'license_plate',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'license_plate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'running_distance'); ?>
		<?php echo $form->textField($model,'running_distance'); ?>
		<?php echo $form->error($model,'running_distance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manufacture_date'); ?>
		<?php echo $form->textField($model,'manufacture_date'); ?>
		<?php echo $form->error($model,'manufacture_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_date'); ?>
		<?php echo $form->textField($model,'registration_date'); ?>
		<?php echo $form->error($model,'registration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_type'); ?>
		<?php echo $form->textField($model,'vehicle_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'vehicle_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sector_ekab_id'); ?>
		<?php echo $form->textField($model,'sector_ekab_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sector_ekab_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->