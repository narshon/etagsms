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
		<?php echo $form->label($model,'dest'); ?>
		<?php echo $form->textField($model,'dest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msg_datetime'); ?>
		<?php echo $form->textField($model,'msg_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msg'); ?>
		<?php echo $form->textField($model,'msg',array('size'=>60,'maxlength'=>160)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msg_status'); ?>
		<?php echo $form->textField($model,'msg_status',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->