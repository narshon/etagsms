<?php
$this->breadcrumbs=array(
	'Sms Incomings'=>array('index'),
	'Manage',
);

$filter = array();
if(isset($status)){
    $filter = array('sms_status'=>$status);
}
if(isset($source)){  
    $filter['source'] = $source;
}
else{
    $filter['source'] = 0;
}

if(isset($dest)){ 
    $filter['dest'] = $dest;
}
$this->service=new ServiceComponent($this,"SmsIncoming");
$this->service->showHybridGridView("","SmsIncoming_hybridgrid",$filter);

