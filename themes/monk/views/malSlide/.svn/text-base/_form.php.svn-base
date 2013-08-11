<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mal-slide-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pk_serial'); ?>
		<?php echo $form->textField($model,'pk_serial'); ?>
		<?php echo $form->error($model,'pk_serial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
		<?php echo $form->error($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wbc'); ?>
		<?php echo $form->textField($model,'wbc'); ?>
		<?php echo $form->error($model,'wbc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rbc'); ?>
		<?php echo $form->textField($model,'rbc'); ?>
		<?php echo $form->error($model,'rbc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hgb'); ?>
		<?php echo $form->textField($model,'hgb'); ?>
		<?php echo $form->error($model,'hgb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mps_100wbc'); ?>
		<?php echo $form->textField($model,'mps_100wbc',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mps_100wbc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mps_500rbc'); ?>
		<?php echo $form->textField($model,'mps_500rbc',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mps_500rbc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'species'); ?>
		<?php echo $form->textField($model,'species',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'species'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mps'); ?>
		<?php echo $form->textField($model,'mps',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mps'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->