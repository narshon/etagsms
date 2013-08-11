<?php
$this->breadcrumbs=array(
	'Kunena Topics'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List KunenaTopics', 'url'=>array('index')),
	//array('label'=>'Add KunenaTopics', 'url'=>array("automated/create",'view'=>'KunenaTopics_form')),
	//array('label'=>'Update KunenaTopics', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KunenaTopics', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaTopics', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update KunenaTopics <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>