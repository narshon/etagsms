<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contentin_id')); ?>:</b>
	<?php echo CHtml::encode($data->contentin_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contentout_id')); ?>:</b>
	<?php echo CHtml::encode($data->contentout_id); ?>
	<br />


</div>