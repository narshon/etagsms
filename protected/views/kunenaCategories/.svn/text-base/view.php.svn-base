<?php
$this->breadcrumbs=array(
	'Kunena Categories'=>array('index'),
	$model->name,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List KunenaCategories', 'url'=>array('index')),
	//array('label'=>'Add KunenaCategories', 'url'=>array("automated/create", 'view'=>'KunenaCategories_form')),
	array('label'=>'Update KunenaCategories', 'url'=>array('automated/update', 'view'=>'KunenaCategories_form', 'id'=>$model->id)),
	array('label'=>'Delete KunenaCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaCategories', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"KunenaCategories");
// details view
$this->service->showDetailView("KunenaCategories Details","KunenaCategories_detail",$model->id);

?>
