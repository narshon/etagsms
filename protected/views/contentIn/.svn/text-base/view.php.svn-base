<?php
$this->breadcrumbs=array(
	'Content Ins'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List ContentIn', 'url'=>array('index')),
	//array('label'=>'Add ContentIn', 'url'=>array("automated/create", 'view'=>'ContentIn_form')),
	array('label'=>'Update ContentIn', 'url'=>array('automated/update', 'view'=>'ContentIn_form', 'id'=>$model->id)),
	array('label'=>'Delete ContentIn', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentIn', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"ContentIn");
// details view
$this->service->showDetailView("","ContentIn_detail",$model->id);

?>
