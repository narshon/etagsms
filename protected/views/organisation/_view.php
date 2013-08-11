<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('org_name')); ?>:</b>
	<?php echo CHtml::encode($data->org_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('org_desc')); ?>:</b>
	<?php echo CHtml::encode($data->org_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('_status')); ?>:</b>
	<?php echo CHtml::encode($data->_status); ?>
	<br />


</div>