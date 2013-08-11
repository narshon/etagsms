<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'process-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sysdef_id'); ?>
		<?php echo $form->textField($model,'sysdef_id'); ?>
		<?php echo $form->error($model,'sysdef_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_categ'); ?>
		<?php echo $form->textField($model,'sub_categ',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sub_categ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'in_text'); ?>
		<?php echo $form->textField($model,'in_text',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'in_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'out_text'); ?>
		<?php echo $form->textField($model,'out_text',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'out_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'out_msg'); ?>
		<?php echo $form->textField($model,'out_msg',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'out_msg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actions'); ?>
		<?php echo $form->textField($model,'actions',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'actions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_status'); ?>
		<?php echo $form->textField($model,'action_status',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'action_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sms_datetime'); ?>
		<?php echo $form->textField($model,'sms_datetime'); ?>
		<?php echo $form->error($model,'sms_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_time'); ?>
		<?php echo $form->textField($model,'default_time',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'default_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'channel'); ?>
		<?php echo $form->textField($model,'channel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_of_week'); ?>
		<?php echo $form->textField($model,'day_of_week',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'day_of_week'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->