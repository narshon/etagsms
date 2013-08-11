<?php
$this->breadcrumbs=array(
	'Views'=>array('index'),
	'Manage',
);


//show portlets for this service
$this->portletRight[]=array(
    array('label'=>'Add Views', 'url'=>array("automated/create",'view'=>'Views_form')),
    array('label'=>'List Views', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");


$this->service=new ServiceComponent($this,"Views");
$this->service->showGridView("Manage Views","Views_grid");

?>



