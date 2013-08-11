<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'definition-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'service_name'); ?>
		<?php echo $form->textField($model,'service_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'service_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_table'); ?>
		<?php echo $form->textField($model,'service_table',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'service_table'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_flag'); ?>
		<?php echo $form->textField($model,'service_flag'); ?>
		<?php echo $form->error($model,'service_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_alias'); ?>
		<?php echo $form->textField($model,'name_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bulk_frequency'); ?>
		<?php echo $form->textField($model,'bulk_frequency',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bulk_frequency'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->