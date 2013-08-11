<?php
$this->breadcrumbs=array(
	'Mal Slides'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List MalSlide', 'url'=>array('index')),
	//array('label'=>'Add MalSlide', 'url'=>array("automated/create",'view'=>'MalSlide_form')),
	//array('label'=>'Update MalSlide', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MalSlide', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MalSlide', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update MalSlide <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>