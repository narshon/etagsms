<?php
$this->breadcrumbs=array(
	'Content Replies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ContentReplies', 'url'=>array('index')),
	//array('label'=>'Add ContentReplies', 'url'=>array("automated/create",'view'=>'ContentReplies_form')),
	//array('label'=>'Update ContentReplies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContentReplies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentReplies', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update ContentReplies <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>