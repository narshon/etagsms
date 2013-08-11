<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_serial'); ?>
		<?php echo $form->textField($model,'pk_serial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wbc'); ?>
		<?php echo $form->textField($model,'wbc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rbc'); ?>
		<?php echo $form->textField($model,'rbc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hgb'); ?>
		<?php echo $form->textField($model,'hgb'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mps_100wbc'); ?>
		<?php echo $form->textField($model,'mps_100wbc',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mps_500rbc'); ?>
		<?php echo $form->textField($model,'mps_500rbc',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'species'); ?>
		<?php echo $form->textField($model,'species',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mps'); ?>
		<?php echo $form->textField($model,'mps',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->