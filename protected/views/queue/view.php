<?php
$this->breadcrumbs=array(
	'Queues'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Queue', 'url'=>array('index')),
	//array('label'=>'Add Queue', 'url'=>array("automated/create", 'view'=>'Queue_form')),
	array('label'=>'Update Queue', 'url'=>array('automated/update', 'view'=>'Queue_form', 'id'=>$model->id)),
	array('label'=>'Delete Queue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Queue', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Queue");
// details view
$this->service->showDetailView("Queue Details","Queue_detail",$model->id);

?>
