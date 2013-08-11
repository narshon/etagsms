<?php
$this->breadcrumbs=array(
	'Content Ins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ContentIn', 'url'=>array('index')),
	//array('label'=>'Add ContentIn', 'url'=>array("automated/create",'view'=>'ContentIn_form')),
	//array('label'=>'Update ContentIn', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContentIn', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentIn', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update ContentIn <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>