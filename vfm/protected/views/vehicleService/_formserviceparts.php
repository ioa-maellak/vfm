
<script type="text/javascript">
function calvatprice(obj)
{
      //initialise dynamic vehicle part variables
       var part_items_id = "VServiceVParts_vehicle_part_item";
       var part_quantity_id = "VServiceVParts_vehicle_part_quantity";
       var net_price_id = "VServiceVParts_net_price";
       var vat_price_id = "VServiceVParts_vat_price";
       var vat_percent_id = "vat_percent";
       //Get current field id and extract the number - the first vehicle part row has no number
       var id_val = $(obj).attr("id");
       var last_numeric_id_val = id_val.match(/\d+/);
       if(last_numeric_id_val == null)
       {
             vat_price_id = vat_price_id;
             vat_percent_id = vat_percent_id;
             part_items_id = part_items_id;
             part_quantity_id =  part_quantity_id;
           
        }
        else{
            net_price_id = net_price_id+last_numeric_id_val;
            vat_price_id = vat_price_id+last_numeric_id_val;
            vat_percent_id = vat_percent_id+last_numeric_id_val;
            part_items_id = part_items_id+last_numeric_id_val;
            part_quantity_id =  part_quantity_id+last_numeric_id_val;
      }
           // Get the current vehicle part quantity, item, net_price and vat_percent values
            var net_price_value = $('#'+net_price_id).val();
            var part_items_value = $('#'+part_items_id).val();
            var part_quantity_value = $('#'+part_quantity_id).val();
            var vat_percent_value= $('#'+vat_percent_id).val();
     
           var totalprice = 0;
       //calculate vehicle part total price including selected vat for items or quantity  
       if(net_price_value != '' && part_items_value != '')
       {
          totalprice = (part_items_value * net_price_value)/100 * vat_percent_value;
        } 
        else if(net_price_value != '' && part_quantity_value != ''){
            
             totalprice = (part_quantity_value * net_price_value)/100 * vat_percent_value;
        }
        else
        {
                totalprice = 0;
        }       
        //display total vat price 
        $('#'+vat_price_id).val(totalprice);

}

</script>
    <?php
    $this->widget('ext.jqrelcopy.JQRelcopy', array(
        'id' => 'copylink',
        'removeText' => 'remove' //uncomment to add remove link
    ));
    ?>  

    <?php if ($this->getAction()->id == 'update'): 
         $itemstotal = count($vehicle_parts);
        if ($itemstotal !== 0) { ?>
        <div class="row">
            <table><tr><td>Part</td><td>Description</td><td>Item</td><td>Quantity</td><td>Net Price</td><td>VAT Price</td></tr></table>
        </div>
         <?php };?>
    <?php foreach ($vehicle_parts as $i => $partsmodel) { ?>
        <div class="row">
            <?php echo $form->textField($partsmodel, "[$i]v_part_id", array('hidden' => true)); ?>
            <?php echo(VehicleParts::model()->findByPk($partsmodel->v_part_id)->name); ?>
            <?php echo $form->textField($partsmodel, "[$i]description", array('size' => 15, 'maxlength' => 45)); ?>
            <?php echo $form->textField($partsmodel, "[$i]vehicle_part_item", array('size' => 5, 'maxlength' => 4, 'onchange'=>'calvatprice($(this))')); ?>
            <?php echo $form->textField($partsmodel, "[$i]vehicle_part_quantity", array('size' => 5, 'maxlength' => 4, 'onchange'=>'calvatprice($(this))')); ?>
            <?php echo $form->textField($partsmodel, "[$i]net_price", array('size' => 10, 'maxlength' => 10, 'onchange'=>'calvatprice($(this))')); ?>
            <?php echo $form->textField($partsmodel, "[$i]vat_price", array('size' => 10, 'maxlength' => 10, 'readOnly'=>'readOnly')); ?>
            <?php echo CHtml::link('Delete', "#", array("submit" => array('/VehicleService/deleteparts', 'id' => $partsmodel->primaryKey), 'confirm' => 'Are you sure you want to delete this item?')); ?>
        </div>
    <?php }
    //$itemstotal = count($vehicle_parts);
    $partsmodel = new VServiceVParts();
    if ($itemstotal == 0) { ?> 
        <div class="row">
        <?php echo $form->labelEx($partsmodel, 'Vehicle Model'); ?>
        <?php echo CHtml::dropDownList('id', '', CHtml::listData(VehicleModel::model()->findAll(), 'id', 'name'), array(
                'empty' => 'Select a Model', '',
                'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('VehicleService/DynamicParts'),
                                'update' => '#' . CHtml::activeId($partsmodel, 'v_part_id[]'),
            ))
        );
        ?> 
        </div>
        <div class="row">
            <table><tr><td>Part</td><td>Description</td><td>Item</td><td>Quantity</td><td>Net Price</td><td>VAT Price</td></tr></table>
        </div>
        <div class="row">   
        <div class="row copy">
            <?php echo $form->dropDownList($partsmodel, '[]v_part_id', array()); ?>                 
            <?php echo $form->textField($partsmodel, '[]description', array('size' => 8, 'maxlength' => 45)); ?>
            <?php echo $form->textField($partsmodel, '[]vehicle_part_item', array('size' => 5, 'maxlength' => 4, 'onchange'=>'calvatprice($(this))')); ?>
            <?php echo $form->textField($partsmodel, '[]vehicle_part_quantity', array('size' => 5, 'maxlength' => 4,  'onchange'=>'calvatprice($(this))')); ?>
            <?php echo $form->textField($partsmodel, '[]net_price', array('size'=>10,'maxlength'=>8,  'onchange'=>'calvatprice($(this))'));?>
            <?php echo CHtml::dropDownList('[]vat_percent', '15', 
                  array('15' => '15%', '23' => '23%'));?>
            <?php echo $form->textField($partsmodel, '[]vat_price', array('size' => 10, 'maxlength' => 10, 'readOnly'=>'readOnly'));?>
        </div>
            <a id="copylink" href="#" rel=".copy">Add a vehicle part</a>  
        </div> 
<?php };
endif;
?>

<?php if ($this->getAction()->id == 'create'): ?> 
    <div class="row">
        <?php echo $form->labelEx($partsmodel, 'Vehicle Model'); ?>
        <?php echo CHtml::dropDownList('id', '', CHtml::listData(VehicleModel::model()->findAll(), 'id', 'name'), array(
                'empty' => 'Select a Model', '',
                'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('VehicleService/DynamicParts'),
                                'update' => '#' . CHtml::activeId($partsmodel, 'v_part_id[]'),
            ))
        );
        ?> 
    </div>
    <div class="row">
        <table><tr><td>Part</td><td>Description</td><td>Item</td><td>Quantity</td><td>Net Price</td><td>VAT Price</td></tr></table>
    </div>
    <div class="row">   
    <div class="row copy">
        <?php echo $form->dropDownList($partsmodel, 'v_part_id[]', array()); ?>                 
        <?php echo $form->textField($partsmodel, 'description[]', array('size' => 8, 'maxlength' => 45)); ?>
        <?php echo $form->textField($partsmodel, 'vehicle_part_item[]', array('size' => 5, 'maxlength' => 4, 'onchange'=>'calvatprice($(this))')); ?>
        <?php echo $form->textField($partsmodel, 'vehicle_part_quantity[]', array('size' => 5, 'maxlength' => 4,  'onchange'=>'calvatprice($(this))')); ?>
        <?php echo $form->textField($partsmodel, 'net_price[]', array('size'=>10,'maxlength'=>8,  'onchange'=>'calvatprice($(this))'));?>
        <?php echo CHtml::dropDownList('vat_percent[]', '15', 
              array('15' => '15%', '23' => '23%'));?>
        <?php echo $form->textField($partsmodel, 'vat_price[]', array('size' => 10, 'maxlength' => 10, 'readOnly'=>'readOnly'));?>
    </div>
        <a id="copylink" href="#" rel=".copy">Add a vehicle part</a>  
    </div> 
<?php endif; ?>


