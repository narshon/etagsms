<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mesid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mesid), array('view', 'id'=>$data->mesid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />


</div>