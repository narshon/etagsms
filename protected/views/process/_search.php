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
		<?php echo $form->label($model,'sysdef_id'); ?>
		<?php echo $form->textField($model,'sysdef_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_categ'); ?>
		<?php echo $form->textField($model,'sub_categ',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'in_text'); ?>
		<?php echo $form->textField($model,'in_text',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'out_text'); ?>
		<?php echo $form->textField($model,'out_text',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'out_msg'); ?>
		<?php echo $form->textField($model,'out_msg',array('size'=>60,'maxlength'=>160)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actions'); ?>
		<?php echo $form->textField($model,'actions',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'action_status'); ?>
		<?php echo $form->textField($model,'action_status',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sms_datetime'); ?>
		<?php echo $form->textField($model,'sms_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_time'); ?>
		<?php echo $form->textField($model,'default_time',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'channel'); ?>
		<?php echo $form->textField($model,'channel',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_of_week'); ?>
		<?php echo $form->textField($model,'day_of_week',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->