<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-replies-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contentin_id'); ?>
		<?php echo $form->textField($model,'contentin_id'); ?>
		<?php echo $form->error($model,'contentin_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contentout_id'); ?>
		<?php echo $form->textField($model,'contentout_id'); ?>
		<?php echo $form->error($model,'contentout_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->