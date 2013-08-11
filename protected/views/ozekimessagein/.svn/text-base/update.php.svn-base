<?php
$this->breadcrumbs=array(
	'Ozekimessageins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Ozekimessagein', 'url'=>array('index')),
	//array('label'=>'Add Ozekimessagein', 'url'=>array("automated/create",'view'=>'Ozekimessagein_form')),
	//array('label'=>'Update Ozekimessagein', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ozekimessagein', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ozekimessagein', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Ozekimessagein <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>