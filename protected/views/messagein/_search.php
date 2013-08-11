<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SendTime'); ?>
		<?php echo $form->textField($model,'SendTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ReceiveTime'); ?>
		<?php echo $form->textField($model,'ReceiveTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MessageFrom'); ?>
		<?php echo $form->textField($model,'MessageFrom',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MessageTo'); ?>
		<?php echo $form->textField($model,'MessageTo',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SMSC'); ?>
		<?php echo $form->textField($model,'SMSC',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MessageText'); ?>
		<?php echo $form->textArea($model,'MessageText',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MessageType'); ?>
		<?php echo $form->textField($model,'MessageType',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MessagePDU'); ?>
		<?php echo $form->textArea($model,'MessagePDU',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gateway'); ?>
		<?php echo $form->textField($model,'Gateway',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserId'); ?>
		<?php echo $form->textField($model,'UserId',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->