<?php
$this->breadcrumbs=array(
	'Messageouts'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Messageout', 'url'=>array('index')),
	//array('label'=>'Add Messageout', 'url'=>array("automated/create",'view'=>'Messageout_form')),
	//array('label'=>'Update Messageout', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Messageout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Messageout', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Messageout <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>