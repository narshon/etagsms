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
		<?php echo $form->label($model,'subscriber_id'); ?>
		<?php echo $form->textField($model,'subscriber_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'in_msg_id'); ?>
		<?php echo $form->textField($model,'in_msg_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_id'); ?>
		<?php echo $form->textField($model,'email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msg_datetime'); ?>
		<?php echo $form->textField($model,'msg_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actiontaken'); ?>
		<?php echo $form->textField($model,'actiontaken',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'action_status'); ?>
		<?php echo $form->textField($model,'action_status',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->