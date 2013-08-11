<?php

/*
//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Subscriber', 'url'=>array("automated/create",'view'=>'Subscriber_form')),
	array('label'=>'Manage Subscriber', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
 * 
 */
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Subscriber Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Subscriber");
$this->service->showListView($criteria,"Subscriber_list",$title);


?>
