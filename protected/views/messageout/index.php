<?php
$this->breadcrumbs=array(
	'Messageouts',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Messageout', 'url'=>array("automated/create",'view'=>'Messageout_form')),
	array('label'=>'Manage Messageout', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Messageout Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Messageout");
$this->service->showListView($criteria,"Messageout_list",$title);


?>
