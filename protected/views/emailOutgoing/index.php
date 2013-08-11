<?php
$this->breadcrumbs=array(
	'Email Outgoings',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add EmailOutgoing', 'url'=>array("automated/create",'view'=>'EmailOutgoing_form')),
	array('label'=>'Manage EmailOutgoing', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> EmailOutgoing Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"EmailOutgoing");
$this->service->showListView($criteria,"EmailOutgoing_list",$title);


?>
