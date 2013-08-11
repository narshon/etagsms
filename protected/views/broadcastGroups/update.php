<?php
$this->breadcrumbs=array(
	'Broadcast Groups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List BroadcastGroups', 'url'=>array('index')),
	//array('label'=>'Add BroadcastGroups', 'url'=>array("automated/create",'view'=>'BroadcastGroups_form')),
	//array('label'=>'Update BroadcastGroups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BroadcastGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BroadcastGroups', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update BroadcastGroups <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>