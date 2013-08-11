<style type="text/css">
div.wide.form label
{
float: left;
margin-right: 10px;
position: relative;
text-align: right;
width: 250px;
        
}
</style>

<?php
//initialize dynamic checkbox properties
$firstEntryModel->$f_entry_field='';
$secondEntryModel->$f_entry_field='';
$secondEntryModel->$s_entry_field='';
$secondEntryModel->neither='';
$field1= explode(substr($f_entry_field, -7),$f_entry_field);
$field2= explode(substr($s_entry_field, -7),$s_entry_field);
$modelName=$secondEntryModel->modelName();
?>
<div class="view">
<div class="wide form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'verify-form',
	'enableAjaxValidation'=>false,
)); ?>
        
	<div class="row" id="<?php echo $f_entry_field; ?>_div">
		<?php echo $form->labelEx($secondEntryModel,$f_entry_field,array('label'=>"",'style'=>"")); ?>
		<?php echo $form->radioButtonlist($secondEntryModel,$f_entry_field,array('0'=>"Use {$field1[0]} first entry value ({$firstEntryModel->$field1[0]})", '1'=>"Use {$field2[0]} second entry value ({$secondEntryModel->$field2[0]})"),array('style'=>'display:inline;')); ?>
		<?php echo $form->error($secondEntryModel,$f_entry_field); ?>
	</div>
         <div class="row" id="neither_div">
		<?php echo $form->labelEx($secondEntryModel,'neither',array('label'=>"Neither",'style'=>"")); ?>
		<?php echo $form->checkBox($secondEntryModel,'neither'); ?>
		<?php echo $form->error($secondEntryModel,'neither'); ?>
	</div>
        <div class="row" id="neither_specify_div">
		<?php echo $form->labelEx($secondEntryModel,'neither_specify',array('label'=>"Neither, Specify new value",'style'=>"")); ?>
		<?php echo $form->textField($secondEntryModel,'neither_specify'); ?>
		<?php echo $form->error($secondEntryModel,'neither_specify'); ?>
	</div>
          <!-- hidden fields -->
          <?php echo $form->hiddenField($secondEntryModel,$field2[0],array('value'=>$secondEntryModel->$field2[0])); ?>
          <?php echo $form->hiddenField($secondEntryModel,'row',array('value'=>$secondEntryModel->row)); ?>
          
	<div class="row buttons">    
            <?php 
             $url=$this->createAbsoluteUrl('automated/verify',array('modelName'=>$modelName,'first_entry_pk'=>$firstEntryModel->id,'second_entry_pk'=>$secondEntryModel->id,'field1'=>$field1[0],'field2'=>$field2[0]));
            ?>
		<?php   echo CHtml::submitButton('Submit', array('onClick'=>"ajaxFormSubmit('$url','ajaxflash','verify-form'); return false; ")); ?>
           
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<script type="text/javascript">
//Document.Ready - Start of jquery execution
$(document).ready(function(){  
    var model="<?php echo $modelName ?>";
    
    bothOnloadAndCheckEvent(model,"neither","neither_specify",0,'');
});
</script>