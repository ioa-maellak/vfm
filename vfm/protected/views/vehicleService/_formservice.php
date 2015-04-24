<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>

<div class="form">
        <p class="note">Fields with <span class="required">*</span> are required.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'vehicle_id'); ?>
                 <?php if ($this->getAction()->id == 'create'){ ?>
                    <?php echo $form->dropDownList($model,'vehicle_id',CHtml::listData(Vehicle::model()->findAll(), 'id', 'license_plate'), array('empty' => 'Select a vehicle', 'id'=>'vehicle_id',));?>   
		 <?php } else {?>
                    <?php echo(Vehicle::model()->findByPk($model->vehicle_id)->license_plate);?>
                 <?php } ?>
                <?php echo $form->error($model,'vehicle_id'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'service_status'); ?>
		<?php echo $form->textField($model,'service_status',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'service_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_date'); ?>
                <?php  $this->widget('CJuiDatePicker',array(
                                    'language'=>Yii::app()->language,
                                    'model'=>$model,
                                    'attribute'=>'service_date',)); ?>
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
                 <?php echo $form->labelEx($model,'vehicle_nextservice_km'); ?>
		 <?php echo $form->textField($model,'vehicle_nextservice_km'); ?>
                 <?php echo $form->error($model,'vehicle_nextservice_km'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'invoice_number'); ?>
		<?php echo $form->textField($model,'invoice_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'invoice_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'garage'); ?>
		<?php echo $form->dropdownlist($model,'garage',array('garage'=>'select a garage', 'garage1'=>'garage01')); ?>
		<?php echo $form->error($model,'garage'); ?>
	</div>
	
	


</div><!-- form -->
