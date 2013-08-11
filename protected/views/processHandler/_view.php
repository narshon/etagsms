<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('process_id')); ?>:</b>
	<?php echo CHtml::encode($data->process_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('handler_name')); ?>:</b>
	<?php echo CHtml::encode($data->handler_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('method')); ?>:</b>
	<?php echo CHtml::encode($data->method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('_status')); ?>:</b>
	<?php echo CHtml::encode($data->_status); ?>
	<br />

	*/ ?>

</div>