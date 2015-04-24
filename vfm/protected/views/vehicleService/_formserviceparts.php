
<div class="form">
  
<?php 
$this->widget('ext.jqrelcopy.JQRelcopy',
                 array(
                       'id' => 'copylink',
                       'removeText' => 'remove' //uncomment to add remove link
                       ));
 ?>  

<div class="row">
    <p class="note">Fields with <span class="required">*</span> are required.</p>

	
  
    
    <div class="row">
        
        <table><tr><td>Part</td><td>Description</td><td>Item</td><td>Quantity</td><td>Net Price</td><td>VAT Price</td></tr></table></div>
   
                <?php if ($this->getAction()->id == 'update'): ?>
                  <?php  foreach ($vehicle_parts as $i=>$partsmodel){ ?>
                            <?php echo $form->textField($partsmodel, "[$i]v_part_id", array('hidden'=>true)); ?>
                            <?php echo(VehicleParts::model()->findByPk($partsmodel->v_part_id)->name);?>
                            <?php echo $form->textField($partsmodel,"[$i]description",array('size'=>15,'maxlength'=>45)); ?>
                            <?php echo $form->textField($partsmodel,"[$i]vehicle_part_item", array('size'=>5,'maxlength'=>4)); ?>
                            <?php echo $form->textField($partsmodel,"[$i]vehicle_part_quantity", array('size'=>5,'maxlength'=>4)); ?>
                            <?php echo $form->textField($partsmodel,"[$i]net_price",array('size'=>10,'maxlength'=>10)); ?>
                            <?php echo $form->textField($partsmodel,"[$i]vat_price",array('size'=>10,'maxlength'=>10)); ?>
                            <?php echo CHtml::link('Delete',"#", array("submit"=>array('/VehicleService/deleteparts', 'id'=>$partsmodel->primaryKey), 'confirm' => 'Are you sure you want to delete this item?')); ?>
                            <br>  
                  <?php  }
                        $itemstotal =count($vehicle_parts);
                        $partsmodel = new VServiceVParts();
                        if ($itemstotal == 0){  ?> 
                            <div class="row copy">
                              <?php echo $form->dropDownList($partsmodel,'[]v_part_id',CHtml::listData(VehicleParts::model()->findAll(), 'id', 'name'), array('empty' => 'Select a part', 'id'=>'id',));?>                  
                              <?php echo $form->textField($partsmodel,'[]description',array('size'=>8,'maxlength'=>45)); ?>
                              <?php echo $form->textField($partsmodel,'[]vehicle_part_item', array('size'=>5,'maxlength'=>4)); ?>
                              <?php echo $form->textField($partsmodel,'[]vehicle_part_quantity', array('size'=>5,'maxlength'=>4)); ?>
                              <?php echo $form->textField($partsmodel,'[]net_price',array('size'=>10,'maxlength'=>10)); ?>
                              <?php echo $form->textField($partsmodel,'[]vat_price',array('size'=>10,'maxlength'=>10)); ?>
                            </div>
                            <a id="copylink" href="#" rel=".copy">Add</a>  
                        <?php }; 
                endif; ?>
                 
                <?php if ($this->getAction()->id == 'create'): 
                     // foreach ($items as $i=>$item){  ?>
                       
                             <?php // print_r($i);?>
                <?php //echo $form->textField($partsmodel,"[$i]v_part_id",array('size'=>5,'maxlength'=>45)); ?>
                
              <?php // }; 
            // }
            // else{?> 
                 <div class="row copy">
                  <?php echo $form->dropDownList($partsmodel,'v_part_id[]',CHtml::listData(VehicleParts::model()->findAll(), 'id', 'name'), array('empty' => 'Select a part', 'id'=>'id',));?>                   
                  <?php echo $form->textField($partsmodel,'description[]',array('size'=>8,'maxlength'=>45)); ?>
                  <?php echo $form->textField($partsmodel,'vehicle_part_item[]', array('size'=>5,'maxlength'=>4)); ?>
                  <?php echo $form->textField($partsmodel,'vehicle_part_quantity[]', array('size'=>5,'maxlength'=>4)); ?>
                  <?php echo $form->textField($partsmodel,'net_price[]',array('size'=>10,'maxlength'=>10)); ?>
                  <?php echo $form->textField($partsmodel,'vat_price[]',array('size'=>10,'maxlength'=>10)); ?>
                 </div>
              <?php//}; ?> 
                <a id="copylink" href="#" rel=".copy">Add</a>  
               <?php endif; ?>
                   
                   
                  
               
	
</div>


