<?php
$this->breadcrumbs=array(
	'Kunena Messages'=>array('index'),
	$model->name,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List KunenaMessages', 'url'=>array('index')),
	//array('label'=>'Add KunenaMessages', 'url'=>array("automated/create", 'view'=>'KunenaMessages_form')),
	array('label'=>'Update KunenaMessages', 'url'=>array('automated/update', 'view'=>'KunenaMessages_form', 'id'=>$model->id)),
	array('label'=>'Delete KunenaMessages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaMessages', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"KunenaMessages");
// details view
$this->service->showDetailView("KunenaMessages Details","KunenaMessages_detail",$model->id);

?>
