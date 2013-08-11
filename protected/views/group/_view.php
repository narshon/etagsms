<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_org_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_org_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_level1')); ?>:</b>
	<?php echo CHtml::encode($data->group_level1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_level2')); ?>:</b>
	<?php echo CHtml::encode($data->group_level2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_level3')); ?>:</b>
	<?php echo CHtml::encode($data->group_level3); ?>
	<br />


</div>