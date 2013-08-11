<?php
$this->breadcrumbs=array(
	'Test2s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Test2', 'url'=>array('index')),
	//array('label'=>'Add Test2', 'url'=>array("automated/create",'view'=>'Test2_form')),
	//array('label'=>'Update Test2', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Test2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Test2', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Test2 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>