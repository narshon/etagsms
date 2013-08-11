<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_broadcast_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_broadcast_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_group_id')); ?>:</b>
	<?php echo CHtml::encode($data->fk_group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
	<?php echo CHtml::encode($data->date_added); ?>
	<br />


</div>