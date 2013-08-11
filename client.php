<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-1.1.8-config/framework/yii.php';
$config=dirname(__FILE__).'/../yii-1.1.8-config/framework/extensions/config/main.php';
require_once(dirname(__FILE__).'/protected/config/config.php');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',DEBUG_MODE);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


require_once($yii);
Yii::createWebApplication($config);

//read online messages to be sent
ini_set ( 'soap.wsdl_cache_enable' , WSDL_CACHE_NONE ); 
ini_set ( 'soap.wsdl_cache_ttl' , 0 );
$wsdlUrl="http://etagservice.com/etagsms/index.php?r=etagsms/sus";
$client=new SoapClient($wsdlUrl);
//$client->login('admin','pass');
$outMsg=$client->getMessageout_list("IsSent=0 && MessageFrom='EtagService'"); 
foreach($outMsg as $msgObject){
    //insert messages locally for sending.
    $messageOut = new Messageout();
    $messageOut->MessageTo = $msgObject->MessageTo;
    $messageOut->MessageText = $msgObject->MessageText;
    $messageOut->Scheduled = $msgObject->Scheduled;
    $messageOut->IsSent = $msgObject->IsSent;
    $messageOut->save(false);
    //update online db as sending...
    $msgObject->IsSent = 2;
   // $client=new SoapClient($wsdlUrl);
    $client->saveMessageout($msgObject);
    print $messageOut->MessageText." forwarded for sending.<br/>";
    
}
//update sent messages in online db
$criteria = new CDbCriteria();
$criteria->condition = "IsSent='1'";
$criteria->limit = 50;
$processedMessages = Messageout::model()->findAll($criteria);
if($processedMessages){
    foreach($processedMessages as $processed){
        //get online message
        $condition = "MessageTo='$processed->MessageTo' and MessageText='$processed->MessageText'";
        $onlineMsg = $client->getMessageout_detail($condition);
        if($onlineMsg){
            $onlineMsg->IsSent = $processed->IsSent;
            //$onlineMsg->senttime = $processed->Scheduled;
            //$onlineMsg->reference = $processed->reference;
            $onlineMsg->MessageType = $processed->MessageType;
            $onlineMsg->Gateway = $processed->Gateway;
            $client->saveMessageout($onlineMsg);
        }
    }
}

//read incoming messages
$criteria = new CDbCriteria();
$criteria->limit = 50;
$messageIn = Messagein::model()->findAll($criteria);
if($messageIn){
    
    foreach ($messageIn as $msgIn){
        $params =  "sender=>$msgIn->MessageFrom,receiver=>$msgIn->MessageTo,msg=>$msgIn->MessageText,senttime=>$msgIn->SendTime,receivedtime=>$msgIn->ReceiveTime,operator=>$msgIn->Gateway,msgtype=>$msgIn->MessageType,dest_org=>EtagService";
                      
       if($client->addMessagein($params)){
           $msgIn->delete();
       }
       
    }
    echo "<br/>Done Receiving messages<br/>";
}


?>
