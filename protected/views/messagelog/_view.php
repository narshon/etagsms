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

	<b><?php echo CHtml::encode($data->getAttributeLabel('StatusCode')); ?>:</b>
	<?php echo CHtml::encode($data->StatusCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StatusText')); ?>:</b>
	<?php echo CHtml::encode($data->StatusText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageTo')); ?>:</b>
	<?php echo CHtml::encode($data->MessageTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageFrom')); ?>:</b>
	<?php echo CHtml::encode($data->MessageFrom); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageText')); ?>:</b>
	<?php echo CHtml::encode($data->MessageText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageType')); ?>:</b>
	<?php echo CHtml::encode($data->MessageType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageId')); ?>:</b>
	<?php echo CHtml::encode($data->MessageId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ErrorCode')); ?>:</b>
	<?php echo CHtml::encode($data->ErrorCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ErrorText')); ?>:</b>
	<?php echo CHtml::encode($data->ErrorText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gateway')); ?>:</b>
	<?php echo CHtml::encode($data->Gateway); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessagePDU')); ?>:</b>
	<?php echo CHtml::encode($data->MessagePDU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserId')); ?>:</b>
	<?php echo CHtml::encode($data->UserId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserInfo')); ?>:</b>
	<?php echo CHtml::encode($data->UserInfo); ?>
	<br />

	*/ ?>

</div>