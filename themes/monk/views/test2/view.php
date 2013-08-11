<?php
$this->breadcrumbs=array(
	'Test2s'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Test2', 'url'=>array('index')),
	//array('label'=>'Add Test2', 'url'=>array("automated/create", 'view'=>'Test2_form')),
	array('label'=>'Update Test2', 'url'=>array('automated/update', 'view'=>'Test2_form', 'id'=>$model->id)),
	array('label'=>'Delete Test2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Test2', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"Test2");
// details view
$this->service->showDetailView("Test2 Details","Test2_detail",$model->id);

?>
