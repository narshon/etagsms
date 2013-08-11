<?php
$this->breadcrumbs=array(
	'Messageins'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Messagein', 'url'=>array('index')),
	//array('label'=>'Add Messagein', 'url'=>array("automated/create",'view'=>'Messagein_form')),
	//array('label'=>'Update Messagein', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Messagein', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Messagein', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Messagein <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>