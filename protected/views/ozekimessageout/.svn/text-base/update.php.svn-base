<?php
$this->breadcrumbs=array(
	'Ozekimessageouts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Ozekimessageout', 'url'=>array('index')),
	//array('label'=>'Add Ozekimessageout', 'url'=>array("automated/create",'view'=>'Ozekimessageout_form')),
	//array('label'=>'Update Ozekimessageout', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ozekimessageout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ozekimessageout', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Ozekimessageout <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>