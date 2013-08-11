<?php
$this->breadcrumbs=array(
	'Messageins'=>array('index'),
	$model->Id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Messagein', 'url'=>array('index')),
	//array('label'=>'Add Messagein', 'url'=>array("automated/create", 'view'=>'Messagein_form')),
	array('label'=>'Update Messagein', 'url'=>array('automated/update', 'view'=>'Messagein_form', 'id'=>$model->Id)),
	array('label'=>'Delete Messagein', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Messagein', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Messagein");
// details view
$this->service->showDetailView("Messagein Details","Messagein_detail",$model->Id);

?>
