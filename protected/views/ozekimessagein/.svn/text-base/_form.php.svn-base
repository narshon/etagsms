<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ozekimessagein-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sender'); ?>
		<?php echo $form->textField($model,'sender',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'sender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver'); ?>
		<?php echo $form->textField($model,'receiver',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'receiver'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msg'); ?>
		<?php echo $form->textField($model,'msg',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'msg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'senttime'); ?>
		<?php echo $form->textField($model,'senttime',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'senttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receivedtime'); ?>
		<?php echo $form->textField($model,'receivedtime',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'receivedtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator'); ?>
		<?php echo $form->textField($model,'operator',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'operator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msgtype'); ?>
		<?php echo $form->textField($model,'msgtype',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'msgtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reference'); ?>
		<?php echo $form->textField($model,'reference',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'reference'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->