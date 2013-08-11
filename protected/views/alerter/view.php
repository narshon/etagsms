<?php
$this->breadcrumbs=array(
	'Alerters'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Alerter', 'url'=>array('index')),
	//array('label'=>'Add Alerter', 'url'=>array("automated/create", 'view'=>'Alerter_form')),
	array('label'=>'Update Alerter', 'url'=>array('automated/update', 'view'=>'Alerter_form', 'id'=>$model->id)),
	array('label'=>'Delete Alerter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alerter', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Alerter");
// details view
$this->service->showDetailView("Alerter Details","Alerter_detail",$model->id);

?>
