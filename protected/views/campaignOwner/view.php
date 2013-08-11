<?php
$this->breadcrumbs=array(
	'Campaign Owners'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List CampaignOwner', 'url'=>array('index')),
	//array('label'=>'Add CampaignOwner', 'url'=>array("automated/create", 'view'=>'CampaignOwner_form')),
	array('label'=>'Update CampaignOwner', 'url'=>array('automated/update', 'view'=>'CampaignOwner_form', 'id'=>$model->id)),
	array('label'=>'Delete CampaignOwner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CampaignOwner', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"CampaignOwner");
// details view
$this->service->showDetailView("CampaignOwner Details","CampaignOwner_detail",$model->id);

?>
