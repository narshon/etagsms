<?php
$this->breadcrumbs=array(
	'Sms Outgoings',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add SmsOutgoing', 'url'=>array("automated/create",'view'=>'SmsOutgoing_form')),
	array('label'=>'Manage SmsOutgoing', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> SmsOutgoing Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"SmsOutgoing");
$this->service->showListView($criteria,"SmsOutgoing_list",$title);


?>
