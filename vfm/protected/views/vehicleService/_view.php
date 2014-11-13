<?php
/* @var $this VehicleServiceController */
/* @var $data VehicleService */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_status')); ?>:</b>
	<?php echo CHtml::encode($data->service_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_date')); ?>:</b>
	<?php echo CHtml::encode($data->service_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('running_distance')); ?>:</b>
	<?php echo CHtml::encode($data->running_distance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_part')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_part); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_part_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_part_quantity); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_number')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garage')); ?>:</b>
	<?php echo CHtml::encode($data->garage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_id')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_id); ?>
	<br />

	*/ ?>

</div>