<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_name')); ?>:</b>
	<?php echo CHtml::encode($data->service_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_table')); ?>:</b>
	<?php echo CHtml::encode($data->service_table); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_flag')); ?>:</b>
	<?php echo CHtml::encode($data->service_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_alias')); ?>:</b>
	<?php echo CHtml::encode($data->name_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type')); ?>:</b>
	<?php echo CHtml::encode($data->service_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bulk_frequency')); ?>:</b>
	<?php echo CHtml::encode($data->bulk_frequency); ?>
	<br />

	*/ ?>

</div>