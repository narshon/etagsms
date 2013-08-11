<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Process', 'url'=>array('index')),
	//array('label'=>'Add Process', 'url'=>array("automated/create",'view'=>'Process_form')),
	//array('label'=>'Update Process', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Process', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Process', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Process <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>