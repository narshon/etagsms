<?php
$this->breadcrumbs=array(
	'Test2s',
);

//show portlets for this service
$this->portletRight[]=array(
	array('label'=>'Add Test2', 'url'=>array("automated/create",'view'=>'Test2_form')),
	array('label'=>'Manage Test2', 'url'=>array('admin')),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Test2 Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Test2");
$this->service->showListView($criteria,"Test2_list",$title);


?>
