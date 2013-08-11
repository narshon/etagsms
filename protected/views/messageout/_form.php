<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messageout-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MessageTo'); ?>
		<?php echo $form->textField($model,'MessageTo',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'MessageTo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MessageFrom'); ?>
		<?php echo $form->textField($model,'MessageFrom',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'MessageFrom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MessageText'); ?>
		<?php echo $form->textArea($model,'MessageText',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'MessageText'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MessageType'); ?>
		<?php echo $form->textField($model,'MessageType',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'MessageType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gateway'); ?>
		<?php echo $form->textField($model,'Gateway',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'Gateway'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserId'); ?>
		<?php echo $form->textField($model,'UserId',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'UserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserInfo'); ?>
		<?php echo $form->textArea($model,'UserInfo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'UserInfo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Priority'); ?>
		<?php echo $form->textField($model,'Priority'); ?>
		<?php echo $form->error($model,'Priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Scheduled'); ?>
		<?php echo $form->textField($model,'Scheduled'); ?>
		<?php echo $form->error($model,'Scheduled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsSent'); ?>
		<?php echo $form->textField($model,'IsSent'); ?>
		<?php echo $form->error($model,'IsSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsRead'); ?>
		<?php echo $form->textField($model,'IsRead'); ?>
		<?php echo $form->error($model,'IsRead'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->