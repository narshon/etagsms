<?php
$this->breadcrumbs=array(
	'Definitions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List Definition', 'url'=>array('index')),
	//array('label'=>'Add Definition', 'url'=>array("automated/create",'view'=>'Definition_form')),
	//array('label'=>'Update Definition', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Definition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Definition', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update Definition <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>