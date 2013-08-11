<?php
$this->breadcrumbs=array(
	'Sms Outgoings'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List SmsOutgoing', 'url'=>array('index')),
	//array('label'=>'Add SmsOutgoing', 'url'=>array("automated/create", 'view'=>'SmsOutgoing_form')),
	array('label'=>'Update SmsOutgoing', 'url'=>array('automated/update', 'view'=>'SmsOutgoing_form', 'id'=>$model->id)),
	array('label'=>'Delete SmsOutgoing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SmsOutgoing', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"SmsOutgoing");
// details view
$this->service->showDetailView("SmsOutgoing Details","SmsOutgoing_detail",$model->id);

?>
