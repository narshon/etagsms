<?php
$this->breadcrumbs=array(
	'Content Replies',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add ContentReplies', 'url'=>array("automated/create",'view'=>'ContentReplies_form')),
	array('label'=>'Manage ContentReplies', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ContentReplies Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ContentReplies");
$this->service->showListView($criteria,"ContentReplies_list",$title);


?>
