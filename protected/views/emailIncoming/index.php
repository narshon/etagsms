<?php
$this->breadcrumbs=array(
	'Email Incomings',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add EmailIncoming', 'url'=>array("automated/create",'view'=>'EmailIncoming_form')),
	array('label'=>'Manage EmailIncoming', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> EmailIncoming Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"EmailIncoming");
$this->service->showListView($criteria,"EmailIncoming_list",$title);


?>
