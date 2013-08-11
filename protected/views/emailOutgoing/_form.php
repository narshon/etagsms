<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-outgoing-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dest'); ?>
		<?php echo $form->textField($model,'dest',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_datetime'); ?>
		<?php echo $form->textField($model,'email_datetime',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msg'); ?>
		<?php echo $form->textArea($model,'msg',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'msg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_status'); ?>
		<?php echo $form->textField($model,'email_status',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->