<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messagelog-form',
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
		<?php echo $form->labelEx($model,'StatusCode'); ?>
		<?php echo $form->textField($model,'StatusCode'); ?>
		<?php echo $form->error($model,'StatusCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StatusText'); ?>
		<?php echo $form->textField($model,'StatusText',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'StatusText'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'MessageId'); ?>
		<?php echo $form->textField($model,'MessageId',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'MessageId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ErrorCode'); ?>
		<?php echo $form->textField($model,'ErrorCode',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'ErrorCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ErrorText'); ?>
		<?php echo $form->textField($model,'ErrorText',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'ErrorText'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gateway'); ?>
		<?php echo $form->textField($model,'Gateway',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'Gateway'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MessagePDU'); ?>
		<?php echo $form->textArea($model,'MessagePDU',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'MessagePDU'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->