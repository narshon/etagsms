<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-in-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'subscriber_id'); ?>
		<?php echo $form->textField($model,'subscriber_id'); ?>
		<?php echo $form->error($model,'subscriber_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id'); ?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'in_msg_id'); ?>
		<?php echo $form->textField($model,'in_msg_id'); ?>
		<?php echo $form->error($model,'in_msg_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_id'); ?>
		<?php echo $form->textField($model,'email_id'); ?>
		<?php echo $form->error($model,'email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msg_datetime'); ?>
		<?php echo $form->textField($model,'msg_datetime'); ?>
		<?php echo $form->error($model,'msg_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actiontaken'); ?>
		<?php echo $form->textField($model,'actiontaken',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'actiontaken'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_status'); ?>
		<?php echo $form->textField($model,'action_status',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'action_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->