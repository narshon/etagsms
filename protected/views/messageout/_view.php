<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageTo')); ?>:</b>
	<?php echo CHtml::encode($data->MessageTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageFrom')); ?>:</b>
	<?php echo CHtml::encode($data->MessageFrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageText')); ?>:</b>
	<?php echo CHtml::encode($data->MessageText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageType')); ?>:</b>
	<?php echo CHtml::encode($data->MessageType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gateway')); ?>:</b>
	<?php echo CHtml::encode($data->Gateway); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserId')); ?>:</b>
	<?php echo CHtml::encode($data->UserId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UserInfo')); ?>:</b>
	<?php echo CHtml::encode($data->UserInfo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Priority')); ?>:</b>
	<?php echo CHtml::encode($data->Priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Scheduled')); ?>:</b>
	<?php echo CHtml::encode($data->Scheduled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsSent')); ?>:</b>
	<?php echo CHtml::encode($data->IsSent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsRead')); ?>:</b>
	<?php echo CHtml::encode($data->IsRead); ?>
	<br />

	*/ ?>

</div>