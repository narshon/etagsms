<?php
$this->breadcrumbs=array(
	'Campaign Groups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List CampaignGroups', 'url'=>array('index')),
	//array('label'=>'Add CampaignGroups', 'url'=>array("automated/create",'view'=>'CampaignGroups_form')),
	//array('label'=>'Update CampaignGroups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CampaignGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CampaignGroups', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update CampaignGroups <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>