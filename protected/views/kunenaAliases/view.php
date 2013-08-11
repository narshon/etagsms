<?php
$this->breadcrumbs=array(
	'Kunena Aliases'=>array('index'),
	$model->alias,
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'List KunenaAliases', 'url'=>array('index')),
	//array('label'=>'Add KunenaAliases', 'url'=>array("automated/create", 'view'=>'KunenaAliases_form')),
	array('label'=>'Update KunenaAliases', 'url'=>array('automated/update', 'view'=>'KunenaAliases_form', 'id'=>$model->alias)),
	array('label'=>'Delete KunenaAliases', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->alias),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KunenaAliases', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");

$this->service=new ServiceComponent($this,"KunenaAliases");
// details view
$this->service->showDetailView("KunenaAliases Details","KunenaAliases_detail",$model->alias);

?>
