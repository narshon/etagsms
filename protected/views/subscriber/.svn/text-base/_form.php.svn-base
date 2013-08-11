<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subscriber-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_id'); ?>
		<?php echo $form->textField($model,'service_id'); ?>
		<?php echo $form->error($model,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag'); ?>
		<?php echo $form->textField($model,'flag'); ?>
		<?php echo $form->error($model,'flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_subscribed'); ?>
		<?php echo $form->textField($model,'date_subscribed'); ?>
		<?php echo $form->error($model,'date_subscribed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_unsubscribed'); ?>
		<?php echo $form->textField($model,'date_unsubscribed'); ?>
		<?php echo $form->error($model,'date_unsubscribed'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->