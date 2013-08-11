<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'broadcast_name'); ?>
		<?php echo $form->textField($model,'broadcast_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'broadcast_desc'); ?>
		<?php echo $form->textArea($model,'broadcast_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'out_text'); ?>
		<?php echo $form->textField($model,'out_text',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'out_msg'); ?>
		<?php echo $form->textField($model,'out_msg',array('size'=>60,'maxlength'=>160)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_time'); ?>
		<?php echo $form->textField($model,'default_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_of_week'); ?>
		<?php echo $form->textField($model,'day_of_week',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flag'); ?>
		<?php echo $form->textField($model,'flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'repeat_mode'); ?>
		<?php echo $form->textField($model,'repeat_mode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->