<?php
$this->breadcrumbs=array(
	'Content Replies'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List ContentReplies', 'url'=>array('index')),
	//array('label'=>'Add ContentReplies', 'url'=>array("automated/create", 'view'=>'ContentReplies_form')),
	array('label'=>'Update ContentReplies', 'url'=>array('automated/update', 'view'=>'ContentReplies_form', 'id'=>$model->id)),
	array('label'=>'Delete ContentReplies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentReplies', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"ContentReplies");
// details view
$this->service->showDetailView("ContentReplies Details","ContentReplies_detail",$model->id);

?>
