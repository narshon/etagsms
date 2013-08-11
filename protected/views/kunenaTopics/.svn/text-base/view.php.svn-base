<?php
$this->breadcrumbs=array(
	'Kunena Topics'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List KunenaTopics', 'url'=>array('index')),
	//array('label'=>'Add KunenaTopics', 'url'=>array("automated/create", 'view'=>'KunenaTopics_form')),
	array('label'=>'Update KunenaTopics', 'url'=>array('automated/update', 'view'=>'KunenaTopics_form', 'id'=>$model->id)),
	array('label'=>'Delete KunenaTopics', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaTopics', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"KunenaTopics");
// details view
$this->service->showDetailView("KunenaTopics Details","KunenaTopics_detail",$model->id);

?>
