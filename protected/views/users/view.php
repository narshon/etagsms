<?php

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Users', 'url'=>array('index')),
	//array('label'=>'Add Users', 'url'=>array("automated/create", 'view'=>'Users_form')),
	array('label'=>'Update Users', 'url'=>array('automated/update', 'view'=>'Users_form', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Users");
// details view
$this->service->showDetailView("Users Details","Users_detail",$model->id);



?>

