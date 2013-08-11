<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kunena-categories-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icon_id'); ?>
		<?php echo $form->textField($model,'icon_id'); ?>
		<?php echo $form->error($model,'icon_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locked'); ?>
		<?php echo $form->textField($model,'locked'); ?>
		<?php echo $form->error($model,'locked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accesstype'); ?>
		<?php echo $form->textField($model,'accesstype',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'accesstype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'access'); ?>
		<?php echo $form->textField($model,'access'); ?>
		<?php echo $form->error($model,'access'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_access'); ?>
		<?php echo $form->textField($model,'pub_access'); ?>
		<?php echo $form->error($model,'pub_access'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_recurse'); ?>
		<?php echo $form->textField($model,'pub_recurse'); ?>
		<?php echo $form->error($model,'pub_recurse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_access'); ?>
		<?php echo $form->textField($model,'admin_access'); ?>
		<?php echo $form->error($model,'admin_access'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_recurse'); ?>
		<?php echo $form->textField($model,'admin_recurse'); ?>
		<?php echo $form->error($model,'admin_recurse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'channels'); ?>
		<?php echo $form->textArea($model,'channels',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'channels'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out'); ?>
		<?php echo $form->textField($model,'checked_out'); ?>
		<?php echo $form->error($model,'checked_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked_out_time'); ?>
		<?php echo $form->textField($model,'checked_out_time'); ?>
		<?php echo $form->error($model,'checked_out_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'review'); ?>
		<?php echo $form->textField($model,'review'); ?>
		<?php echo $form->error($model,'review'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allow_anonymous'); ?>
		<?php echo $form->textField($model,'allow_anonymous'); ?>
		<?php echo $form->error($model,'allow_anonymous'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_anonymous'); ?>
		<?php echo $form->textField($model,'post_anonymous'); ?>
		<?php echo $form->error($model,'post_anonymous'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hits'); ?>
		<?php echo $form->textField($model,'hits'); ?>
		<?php echo $form->error($model,'hits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'headerdesc'); ?>
		<?php echo $form->textArea($model,'headerdesc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'headerdesc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_sfx'); ?>
		<?php echo $form->textField($model,'class_sfx',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'class_sfx'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allow_polls'); ?>
		<?php echo $form->textField($model,'allow_polls'); ?>
		<?php echo $form->error($model,'allow_polls'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'topic_ordering'); ?>
		<?php echo $form->textField($model,'topic_ordering',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'topic_ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numTopics'); ?>
		<?php echo $form->textField($model,'numTopics'); ?>
		<?php echo $form->error($model,'numTopics'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numPosts'); ?>
		<?php echo $form->textField($model,'numPosts'); ?>
		<?php echo $form->error($model,'numPosts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_topic_id'); ?>
		<?php echo $form->textField($model,'last_topic_id'); ?>
		<?php echo $form->error($model,'last_topic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_post_id'); ?>
		<?php echo $form->textField($model,'last_post_id'); ?>
		<?php echo $form->error($model,'last_post_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_post_time'); ?>
		<?php echo $form->textField($model,'last_post_time'); ?>
		<?php echo $form->error($model,'last_post_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'params'); ?>
		<?php echo $form->textArea($model,'params',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'params'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->