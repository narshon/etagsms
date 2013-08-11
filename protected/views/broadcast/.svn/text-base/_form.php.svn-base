<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'broadcast-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id'); ?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'broadcast_name'); ?>
		<?php echo $form->textField($model,'broadcast_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'broadcast_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'broadcast_desc'); ?>
		<?php echo $form->textArea($model,'broadcast_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'broadcast_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'out_text'); ?>
		<?php echo $form->textField($model,'out_text',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'out_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'out_msg'); ?>
		<?php echo $form->textField($model,'out_msg',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'out_msg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_time'); ?>
		<?php echo $form->textField($model,'default_time'); ?>
		<?php echo $form->error($model,'default_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_of_week'); ?>
		<?php echo $form->textField($model,'day_of_week',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'day_of_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag'); ?>
		<?php echo $form->textField($model,'flag'); ?>
		<?php echo $form->error($model,'flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repeat_mode'); ?>
		<?php echo $form->textField($model,'repeat_mode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'repeat_mode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->