<?php
$this->breadcrumbs=array(
	'Email Incomings'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List EmailIncoming', 'url'=>array('index')),
	//array('label'=>'Add EmailIncoming', 'url'=>array("automated/create", 'view'=>'EmailIncoming_form')),
	array('label'=>'Update EmailIncoming', 'url'=>array('automated/update', 'view'=>'EmailIncoming_form', 'id'=>$model->id)),
	array('label'=>'Delete EmailIncoming', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailIncoming', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"EmailIncoming");
// details view
$this->service->showDetailView("EmailIncoming Details","EmailIncoming_detail",$model->id);

?>
