<?php
$this->breadcrumbs=array(
	'Broadcast Groups'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List BroadcastGroups', 'url'=>array('index')),
	//array('label'=>'Add BroadcastGroups', 'url'=>array("automated/create", 'view'=>'BroadcastGroups_form')),
	array('label'=>'Update BroadcastGroups', 'url'=>array('automated/update', 'view'=>'BroadcastGroups_form', 'id'=>$model->id)),
	array('label'=>'Delete BroadcastGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BroadcastGroups', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"BroadcastGroups");
// details view
$this->service->showDetailView("BroadcastGroups Details","BroadcastGroups_detail",$model->id);

?>
