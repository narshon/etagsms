<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messagein-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'SendTime'); ?>
		<?php echo $form->textField($model,'SendTime'); ?>
		<?php echo $form->error($model,'SendTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ReceiveTime'); ?>
		<?php echo $form->textField($model,'ReceiveTime'); ?>
		<?php echo $form->error($model,'ReceiveTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MessageFrom'); ?>
		<?php echo $form->textField($model,'MessageFrom',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'MessageFrom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MessageTo'); ?>
		<?php echo $form->textField($model,'MessageTo',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'MessageTo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SMSC'); ?>
		<?php echo $form->textField($model,'SMSC',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'SMSC'); ?>
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
		<?php echo $form->labelEx($model,'MessagePDU'); ?>
		<?php echo $form->textArea($model,'MessagePDU',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'MessagePDU'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->