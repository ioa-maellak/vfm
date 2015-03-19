<?php
/* @var $this VehicleController */
/* @var $data Vehicle */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('license_plate')); ?>:</b>
	<?php echo CHtml::encode($data->license_plate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('running_distance')); ?>:</b>
	<?php echo CHtml::encode($data->running_distance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manufacture_date')); ?>:</b>
	<?php echo CHtml::encode($data->manufacture_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_date')); ?>:</b>
	<?php echo CHtml::encode($data->registration_date); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('nextservice_km')); ?>:</b>
	<?php echo CHtml::encode($data->nextservice_km); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_type')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_type); ?>
	<br />

	
	<b> <?php echo CHtml::encode($data->getAttributeLabel('sector_ekab_id')); ?>:</b>
	<?php //        echo CHtml::encode($data->sector_ekab_id);
                echo SectorEkab::model()->findByPk($data->sector_ekab_id)->name;
        ?>
	<br />

	
</div>