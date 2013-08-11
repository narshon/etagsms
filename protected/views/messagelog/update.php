<?php
$this->breadcrumbs=array(
	'Messagelogs'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Messagelog', 'url'=>array('index')),
	//array('label'=>'Add Messagelog', 'url'=>array("automated/create",'view'=>'Messagelog_form')),
	//array('label'=>'Update Messagelog', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Messagelog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Messagelog', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Messagelog <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>