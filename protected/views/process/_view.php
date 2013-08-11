<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sysdef_id')); ?>:</b>
	<?php echo CHtml::encode($data->sysdef_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_categ')); ?>:</b>
	<?php echo CHtml::encode($data->sub_categ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('in_text')); ?>:</b>
	<?php echo CHtml::encode($data->in_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('out_text')); ?>:</b>
	<?php echo CHtml::encode($data->out_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('out_msg')); ?>:</b>
	<?php echo CHtml::encode($data->out_msg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actions')); ?>:</b>
	<?php echo CHtml::encode($data->actions); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('action_status')); ?>:</b>
	<?php echo CHtml::encode($data->action_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sms_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->sms_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_time')); ?>:</b>
	<?php echo CHtml::encode($data->default_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('channel')); ?>:</b>
	<?php echo CHtml::encode($data->channel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_of_week')); ?>:</b>
	<?php echo CHtml::encode($data->day_of_week); ?>
	<br />

	*/ ?>

</div>