<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'organisation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'org_name',array('label'=>'Company Name')); ?>
		<?php echo $form->textField($model,'org_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'org_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'org_desc',array('label'=>'Description')); ?>
		<?php echo $form->textArea($model,'org_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'org_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'_status', array('label'=>'Status')); ?>
		<?php echo $form->dropdownlist($model,'_status', array(''=>'','0'=>'Off', '1'=>'On')); ?>
		<?php echo $form->error($model,'_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Next' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->