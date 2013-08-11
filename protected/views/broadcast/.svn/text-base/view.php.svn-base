<?php
$this->breadcrumbs=array(
	'Broadcasts'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Broadcast', 'url'=>array('index')),
	//array('label'=>'Add Broadcast', 'url'=>array("automated/create", 'view'=>'Broadcast_form')),
	array('label'=>'Update Broadcast', 'url'=>array('automated/update', 'view'=>'Broadcast_form', 'id'=>$model->id)),
	array('label'=>'Delete Broadcast', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Broadcast', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Broadcast");
// details view
$this->service->showDetailView("Broadcast Details","Broadcast_detail",$model->id);

?>
