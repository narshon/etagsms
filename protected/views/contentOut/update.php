<?php
$this->breadcrumbs=array(
	'Content Outs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List ContentOut', 'url'=>array('index')),
	//array('label'=>'Add ContentOut', 'url'=>array("automated/create",'view'=>'ContentOut_form')),
	//array('label'=>'Update ContentOut', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContentOut', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentOut', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update ContentOut <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>