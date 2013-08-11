<?php
$this->breadcrumbs=array(
	'Sms Incomings'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List SmsIncoming', 'url'=>array('index')),
	//array('label'=>'Add SmsIncoming', 'url'=>array("automated/create", 'view'=>'SmsIncoming_form')),
	array('label'=>'Update SmsIncoming', 'url'=>array('automated/update', 'view'=>'SmsIncoming_form', 'id'=>$model->id)),
	array('label'=>'Delete SmsIncoming', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SmsIncoming', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"SmsIncoming");
// details view
$this->service->showDetailView("SmsIncoming Details","SmsIncoming_detail",$model->id);

?>
