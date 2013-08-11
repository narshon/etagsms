<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usergroup'); ?>
		<?php echo $form->textField($model,'usergroup',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'usergroup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name1'); ?>
		<?php echo $form->textField($model,'name1',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name2'); ?>
		<?php echo $form->textField($model,'name2',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name3'); ?>
		<?php echo $form->textField($model,'name3',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->