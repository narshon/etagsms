<?php
$this->breadcrumbs=array(
	'Alerters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Alerter', 'url'=>array('index')),
	//array('label'=>'Add Alerter', 'url'=>array("automated/create",'view'=>'Alerter_form')),
	//array('label'=>'Update Alerter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alerter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alerter', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Alerter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>