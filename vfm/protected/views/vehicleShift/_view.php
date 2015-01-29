<?php
/* @var $this VehicleShiftController */
/* @var $data VehicleShift */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_id')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_start_km')); ?>:</b>
	<?php echo CHtml::encode($data->shift_start_km); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_end_km')); ?>:</b>
	<?php echo CHtml::encode($data->shift_end_km); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_used_fuel')); ?>:</b>
	<?php echo CHtml::encode($data->shift_used_fuel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_start_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->shift_start_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_end_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->shift_end_datetime); ?>
	<br />


</div>