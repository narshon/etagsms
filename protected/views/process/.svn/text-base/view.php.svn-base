<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Process', 'url'=>array('index')),
	//array('label'=>'Add Process', 'url'=>array("automated/create", 'view'=>'Process_form')),
	array('label'=>'Update Process', 'url'=>array('automated/update', 'view'=>'Process_form', 'id'=>$model->id)),
	array('label'=>'Delete Process', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Process', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Process");
// details view
$this->service->showDetailView("Process Details","Process_detail",$model->id);

?>
