<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List Group', 'url'=>array('index')),
	//array('label'=>'Add Group', 'url'=>array("automated/create", 'view'=>'Group_form')),
	array('label'=>'Update Group', 'url'=>array('automated/update', 'view'=>'Group_form', 'id'=>$model->id)),
	array('label'=>'Delete Group', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Group', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"Group");
// details view
$this->service->showDetailView("Group Details","Group_detail",$model->id);

?>
