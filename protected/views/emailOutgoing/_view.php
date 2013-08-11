<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dest')); ?>:</b>
	<?php echo CHtml::encode($data->dest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->email_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('msg')); ?>:</b>
	<?php echo CHtml::encode($data->msg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_status')); ?>:</b>
	<?php echo CHtml::encode($data->email_status); ?>
	<br />


</div>