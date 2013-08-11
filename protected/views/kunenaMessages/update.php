<?php
$this->breadcrumbs=array(
	'Kunena Messages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List KunenaMessages', 'url'=>array('index')),
	//array('label'=>'Add KunenaMessages', 'url'=>array("automated/create",'view'=>'KunenaMessages_form')),
	//array('label'=>'Update KunenaMessages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KunenaMessages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaMessages', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update KunenaMessages <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>