<?php
/* @var $this VehicleServiceController */
/* @var $model VehicleService */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehicle-service-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'service_status'); ?>
		<?php echo $form->textField($model,'service_status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'service_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_date'); ?>
		<?php echo $form->textField($model,'service_date'); ?>
		<?php echo $form->error($model,'service_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'running_distance'); ?>
		<?php echo $form->textField($model,'running_distance'); ?>
		<?php echo $form->error($model,'running_distance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_part'); ?>
		<?php echo $form->textField($model,'vehicle_part',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'vehicle_part'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_part_quantity'); ?>
		<?php echo $form->textField($model,'vehicle_part_quantity'); ?>
		<?php echo $form->error($model,'vehicle_part_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_number'); ?>
		<?php echo $form->textField($model,'invoice_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'invoice_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'garage'); ?>
		<?php echo $form->textArea($model,'garage',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'garage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_id'); ?>
		<?php echo $form->textField($model,'vehicle_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'vehicle_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->