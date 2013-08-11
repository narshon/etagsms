<?php
$this->breadcrumbs=array(
	'Messagelogs'=>array('index'),
	$model->Id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Messagelog', 'url'=>array('index')),
	//array('label'=>'Add Messagelog', 'url'=>array("automated/create", 'view'=>'Messagelog_form')),
	array('label'=>'Update Messagelog', 'url'=>array('automated/update', 'view'=>'Messagelog_form', 'id'=>$model->Id)),
	array('label'=>'Delete Messagelog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Messagelog', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Messagelog");
// details view
$this->service->showDetailView("Messagelog Details","Messagelog_detail",$model->Id);

?>
