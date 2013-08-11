<?php
$this->breadcrumbs=array(
	'Subscribers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Subscriber', 'url'=>array('index')),
	//array('label'=>'Add Subscriber', 'url'=>array("automated/create",'view'=>'Subscriber_form')),
	//array('label'=>'Update Subscriber', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Subscriber', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subscriber', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Subscriber <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>