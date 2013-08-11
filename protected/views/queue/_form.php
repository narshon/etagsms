<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'queue-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dest'); ?>
		<?php echo $form->textField($model,'dest'); ?>
		<?php echo $form->error($model,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id'); ?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msg_datetime'); ?>
		<?php echo $form->textField($model,'msg_datetime'); ?>
		<?php echo $form->error($model,'msg_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msg'); ?>
		<?php echo $form->textField($model,'msg',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'msg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msg_status'); ?>
		<?php echo $form->textField($model,'msg_status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'msg_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->