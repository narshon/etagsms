<?php
$this->breadcrumbs=array(
	'Campaign Owners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List CampaignOwner', 'url'=>array('index')),
	//array('label'=>'Add CampaignOwner', 'url'=>array("automated/create",'view'=>'CampaignOwner_form')),
	//array('label'=>'Update CampaignOwner', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CampaignOwner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CampaignOwner', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update CampaignOwner <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>