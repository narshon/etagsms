<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sender')); ?>:</b>
	<?php echo CHtml::encode($data->sender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver')); ?>:</b>
	<?php echo CHtml::encode($data->receiver); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('msg')); ?>:</b>
	<?php echo CHtml::encode($data->msg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('senttime')); ?>:</b>
	<?php echo CHtml::encode($data->senttime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receivedtime')); ?>:</b>
	<?php echo CHtml::encode($data->receivedtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference')); ?>:</b>
	<?php echo CHtml::encode($data->reference); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('msgtype')); ?>:</b>
	<?php echo CHtml::encode($data->msgtype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator')); ?>:</b>
	<?php echo CHtml::encode($data->operator); ?>
	<br />

	*/ ?>

</div>