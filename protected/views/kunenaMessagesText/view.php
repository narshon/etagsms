<?php
$this->breadcrumbs=array(
	'Kunena Messages Texts'=>array('index'),
	$model->mesid,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List KunenaMessagesText', 'url'=>array('index')),
	//array('label'=>'Add KunenaMessagesText', 'url'=>array("automated/create", 'view'=>'KunenaMessagesText_form')),
	array('label'=>'Update KunenaMessagesText', 'url'=>array('automated/update', 'view'=>'KunenaMessagesText_form', 'id'=>$model->mesid)),
	array('label'=>'Delete KunenaMessagesText', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mesid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaMessagesText', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"KunenaMessagesText");
// details view
$this->service->showDetailView("KunenaMessagesText Details","KunenaMessagesText_detail",$model->mesid);

?>
