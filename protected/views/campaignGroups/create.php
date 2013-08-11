<?php
$this->breadcrumbs=array(
	'Campaign Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CampaignGroups', 'url'=>array('index')),
	array('label'=>'Manage CampaignGroups', 'url'=>array('admin')),
);
?>

<h1>Create CampaignGroups</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>