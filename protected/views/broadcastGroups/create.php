<?php
$this->breadcrumbs=array(
	'Broadcast Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BroadcastGroups', 'url'=>array('index')),
	array('label'=>'Manage BroadcastGroups', 'url'=>array('admin')),
);
?>

<h1>Create BroadcastGroups</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>