<?php
$this->breadcrumbs=array(
	'Groups',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Group', 'url'=>array("automated/create",'view'=>'Group_form')),
	array('label'=>'Manage Group', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Group Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Group");
$this->service->showListView($criteria,"Group_list",$title);


?>
