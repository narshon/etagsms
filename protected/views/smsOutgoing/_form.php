<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-outgoing-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dest'); ?>
		<?php echo $form->textField($model,'dest',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sms_datetime'); ?>
		<?php echo $form->textField($model,'sms_datetime',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sms_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msg'); ?>
		<?php echo $form->textField($model,'msg',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'msg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sms_status'); ?>
		<?php echo $form->textField($model,'sms_status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sms_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->