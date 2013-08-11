<?php
$this->breadcrumbs=array(
	'Campaign Groups'=>array('index'),
	$model->id,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List CampaignGroups', 'url'=>array('index')),
	//array('label'=>'Add CampaignGroups', 'url'=>array("automated/create", 'view'=>'CampaignGroups_form')),
	array('label'=>'Update CampaignGroups', 'url'=>array('automated/update', 'view'=>'CampaignGroups_form', 'id'=>$model->id)),
	array('label'=>'Delete CampaignGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CampaignGroups', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"CampaignGroups");
// details view
$this->service->showDetailView($model->group->group_level3." Details","CampaignGroups_detail",$model->id);

//subscribers of current campaign in this group
$id = Yii::app()->session->get('current_campaign');
print '<div  class="view">';
        $this->renderPartial('../subscriber/admin',(array('model_id'=>$id,'group_id'=>$model->group_id)),false,true);
print  "</div>";

?>
