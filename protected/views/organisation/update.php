<?php
$this->breadcrumbs=array(
	'Organisations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Organisation', 'url'=>array('index')),
	//array('label'=>'Add Organisation', 'url'=>array("automated/create",'view'=>'Organisation_form')),
	//array('label'=>'Update Organisation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Organisation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Organisation', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Organisation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>