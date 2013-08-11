<?php
$this->breadcrumbs=array(
	'Email Outgoings'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List EmailOutgoing', 'url'=>array('index')),
	//array('label'=>'Add EmailOutgoing', 'url'=>array("automated/create", 'view'=>'EmailOutgoing_form')),
	array('label'=>'Update EmailOutgoing', 'url'=>array('automated/update', 'view'=>'EmailOutgoing_form', 'id'=>$model->id)),
	array('label'=>'Delete EmailOutgoing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailOutgoing', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"EmailOutgoing");
// details view
$this->service->showDetailView("EmailOutgoing Details","EmailOutgoing_detail",$model->id);

?>
