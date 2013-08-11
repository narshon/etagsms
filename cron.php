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

// attaching dataportlets event handler
/*
     Yii::import('application.controllers.*');           
    $controller = new DefinitionController('Definition');
    $eventManager=new CMonkEventManager();
    $eventNameArray=array('onDataPortlet');
    $eventManager->init($eventNameArray);
     //raise dataportlets event
    $event=new CEvent($controller, array('controller'=>$controller));
    $eventManager->onDataPortlet($event);
*/
 //Process 
echo "<p>";
 Process::model()->main();
echo "</p>";

 //Outgoing SMS 
echo "<p>";
 SmsOutgoing::model()->checkOutgoingSMS();
echo "</p>";
 //Incoming SMS 
echo "<p>";
 SmsIncoming::model()->checkIncomingSMS();
echo "</p>";

//Outgoing Email 
echo "<p>";
 EmailOutgoing::model()->checkOutgoingEmail();
echo "</p>";
 //Incoming SMS 
echo "<p>";
 EmailIncoming::model()->checkIncomingEmail();
echo "</p>";

$this->widget('application.extensions.email.debug');

//Send SMS 
echo "<p>";
 //Ozekimessageout::model()->BulkSMSSend();
echo "</p>";
