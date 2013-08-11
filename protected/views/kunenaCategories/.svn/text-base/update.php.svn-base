<?php
$this->breadcrumbs=array(
	'Kunena Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List KunenaCategories', 'url'=>array('index')),
	//array('label'=>'Add KunenaCategories', 'url'=>array("automated/create",'view'=>'KunenaCategories_form')),
	//array('label'=>'Update KunenaCategories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KunenaCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaCategories', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update KunenaCategories <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>