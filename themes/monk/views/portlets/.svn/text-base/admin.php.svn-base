<?php
$this->breadcrumbs=array(
	'Portlets'=>array('index'),
	'Manage',
);


//show portlets for this service
$this->portletRight[]=array(
    array('label'=>'Add Portlets', 'url'=>array("automated/create",'view'=>'Portlets_form')),
    array('label'=>'List Portlets', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");


$this->service=new ServiceComponent($this,"Portlets");
$this->service->showGridView("Manage Portlets","Portlets_grid");

?>



