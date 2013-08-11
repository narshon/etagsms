<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SendTime')); ?>:</b>
	<?php echo CHtml::encode($data->SendTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReceiveTime')); ?>:</b>
	<?php echo CHtml::encode($data->ReceiveTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageFrom')); ?>:</b>
	<?php echo CHtml::encode($data->MessageFrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageTo')); ?>:</b>
	<?php echo CHtml::encode($data->MessageTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SMSC')); ?>:</b>
	<?php echo CHtml::encode($data->SMSC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageText')); ?>:</b>
	<?php echo CHtml::encode($data->MessageText); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageType')); ?>:</b>
	<?php echo CHtml::encode($data->MessageType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessagePDU')); ?>:</b>
	<?php echo CHtml::encode($data->MessagePDU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gateway')); ?>:</b>
	<?php echo CHtml::encode($data->Gateway); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserId')); ?>:</b>
	<?php echo CHtml::encode($data->UserId); ?>
	<br />

	*/ ?>

</div>