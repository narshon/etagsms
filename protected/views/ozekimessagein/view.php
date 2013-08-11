<?php
$this->breadcrumbs=array(
	'Ozekimessageins'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Ozekimessagein', 'url'=>array('index')),
	//array('label'=>'Add Ozekimessagein', 'url'=>array("automated/create", 'view'=>'Ozekimessagein_form')),
	array('label'=>'Update Ozekimessagein', 'url'=>array('automated/update', 'view'=>'Ozekimessagein_form', 'id'=>$model->id)),
	array('label'=>'Delete Ozekimessagein', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ozekimessagein', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Ozekimessagein");
// details view
$this->service->showDetailView("Ozekimessagein Details","Ozekimessagein_detail",$model->id);

?>
