<?php
$this->breadcrumbs=array(
	'Alerters',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Alerter', 'url'=>array("automated/create",'view'=>'Alerter_form')),
	array('label'=>'Manage Alerter', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Alerter Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Alerter");
$this->service->showListView($criteria,"Alerter_list",$title);


?>
