<?php
/* @var $this VehicleShiftController */
/* @var $model VehicleShift */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_start_km'); ?>
		<?php echo $form->textField($model,'shift_start_km'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_end_km'); ?>
		<?php echo $form->textField($model,'shift_end_km'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_used_fuel'); ?>
		<?php echo $form->textField($model,'shift_used_fuel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_start_datetime'); ?>
		<?php echo $form->textField($model,'shift_start_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_end_datetime'); ?>
		<?php echo $form->textField($model,'shift_end_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->