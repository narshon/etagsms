<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'broadcast-groups-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_broadcast_id'); ?>
		<?php echo $form->textField($model,'fk_broadcast_id'); ?>
		<?php echo $form->error($model,'fk_broadcast_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_group_id'); ?>
		<?php echo $form->textField($model,'fk_group_id'); ?>
		<?php echo $form->error($model,'fk_group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_added'); ?>
		<?php echo $form->textField($model,'date_added'); ?>
		<?php echo $form->error($model,'date_added'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->