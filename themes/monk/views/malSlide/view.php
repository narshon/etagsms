<?php
$this->breadcrumbs=array(
	'Mal Slides'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List MalSlide', 'url'=>array('index')),
	//array('label'=>'Add MalSlide', 'url'=>array("automated/create", 'view'=>'MalSlide_form')),
	array('label'=>'Update MalSlide', 'url'=>array('automated/update', 'view'=>'MalSlide_form', 'id'=>$model->id)),
	array('label'=>'Delete MalSlide', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MalSlide', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");

$this->service=new ServiceComponent($this,"MalSlide");
// details view
$this->service->showDetailView("MalSlide Details","MalSlide_detail",$model->id);

?>
