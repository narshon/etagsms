<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_org_id'); ?>
		<?php echo $form->textField($model,'fk_org_id'); ?>
		<?php echo $form->error($model,'fk_org_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_level1'); ?>
		<?php echo $form->textField($model,'group_level1',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'group_level1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_level2'); ?>
		<?php echo $form->textField($model,'group_level2',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'group_level2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_level3'); ?>
		<?php echo $form->textField($model,'group_level3',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'group_level3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->