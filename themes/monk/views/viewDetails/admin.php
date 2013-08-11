<?php
$this->breadcrumbs=array(
	'View Details'=>array('index'),
	'Manage',
);


//show portlets for this service
$this->portletRight[]=array(
    array('label'=>'Add ViewDetails', 'url'=>array("automated/create",'view'=>'ViewDetails_form')),
    array('label'=>'List View Details', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");


$this->service=new ServiceComponent($this,"ViewDetails");
$this->service->showGridView("Manage View Details","ViewDetails_grid");

?>



