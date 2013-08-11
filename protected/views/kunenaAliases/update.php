<?php
$this->breadcrumbs=array(
	'Kunena Aliases'=>array('index'),
	$model->alias=>array('view','id'=>$model->alias),
	'Update',
);

//show portlets for this service
$this->portletRight[]=array(
	//array('label'=>'List KunenaAliases', 'url'=>array('index')),
	//array('label'=>'Add KunenaAliases', 'url'=>array("automated/create",'view'=>'KunenaAliases_form')),
	//array('label'=>'Update KunenaAliases', 'url'=>array('update', 'id'=>$model->alias)),
	array('label'=>'Delete KunenaAliases', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->alias),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaAliases', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1>Update KunenaAliases <?php echo $model->alias; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>