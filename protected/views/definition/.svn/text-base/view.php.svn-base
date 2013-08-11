<?php
$this->breadcrumbs=array(
	'Definitions'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Definition', 'url'=>array('index')),
	//array('label'=>'Add Definition', 'url'=>array("automated/create", 'view'=>'Definition_form')),
	array('label'=>'Update Definition', 'url'=>array('automated/update', 'view'=>'Definition_form', 'id'=>$model->id)),
	array('label'=>'Delete Definition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Definition', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Definition");
// details view
$this->service->showDetailView("Definition Details","Definition_detail",$model->id);

?>
