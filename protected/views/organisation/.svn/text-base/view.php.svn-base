<?php
$this->breadcrumbs=array(
	'Organisations'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Organisation', 'url'=>array('index')),
	//array('label'=>'Add Organisation', 'url'=>array("automated/create", 'view'=>'Organisation_form')),
	array('label'=>'Update Organisation', 'url'=>array('automated/update', 'view'=>'Organisation_form', 'id'=>$model->id)),
	array('label'=>'Delete Organisation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Organisation', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Organisation");
// details view
$this->service->showDetailView("Organisation Details","Organisation_detail",$model->id);

?>
