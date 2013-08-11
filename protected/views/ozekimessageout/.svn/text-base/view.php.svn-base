<?php
$this->breadcrumbs=array(
	'Ozekimessageouts'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Ozekimessageout', 'url'=>array('index')),
	//array('label'=>'Add Ozekimessageout', 'url'=>array("automated/create", 'view'=>'Ozekimessageout_form')),
	array('label'=>'Update Ozekimessageout', 'url'=>array('automated/update', 'view'=>'Ozekimessageout_form', 'id'=>$model->id)),
	array('label'=>'Delete Ozekimessageout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ozekimessageout', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Ozekimessageout");
// details view
$this->service->showDetailView("Ozekimessageout Details","Ozekimessageout_detail",$model->id);

?>
