<?php
$this->breadcrumbs=array(
	'Process Handlers'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List ProcessHandler', 'url'=>array('index')),
	//array('label'=>'Add ProcessHandler', 'url'=>array("automated/create", 'view'=>'ProcessHandler_form')),
	array('label'=>'Update ProcessHandler', 'url'=>array('automated/update', 'view'=>'ProcessHandler_form', 'id'=>$model->id)),
	array('label'=>'Delete ProcessHandler', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProcessHandler', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"ProcessHandler");
// details view
$this->service->showDetailView("ProcessHandler Details","ProcessHandler_detail",$model->id);

?>
