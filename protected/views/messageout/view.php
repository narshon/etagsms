<?php
$this->breadcrumbs=array(
	'Messageouts'=>array('index'),
	$model->Id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Messageout', 'url'=>array('index')),
	//array('label'=>'Add Messageout', 'url'=>array("automated/create", 'view'=>'Messageout_form')),
	array('label'=>'Update Messageout', 'url'=>array('automated/update', 'view'=>'Messageout_form', 'id'=>$model->Id)),
	array('label'=>'Delete Messageout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Messageout', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Messageout");
// details view
$this->service->showDetailView("Messageout Details","Messageout_detail",$model->Id);

?>
