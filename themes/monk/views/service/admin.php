<?php
$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Manage',
);


//show portlets for this service
$this->portlet[]=array(
    array('label'=>'Add Service', 'url'=>array("automated/create",'view'=>'Service_form')),
    array('label'=>'List Services', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");


$this->service=new ServiceComponent($this,"Service");
$this->service->showGridView("Manage Services","Service_grid");

?>



