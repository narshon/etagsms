<?php

/**
 * This is the model class for table "sys_process".
 *
 * The followings are the available columns in table 'sys_process':
 * @property integer $id
 * @property integer $sysdef_id
 * @property string $sub_categ
 * @property string $in_text
 * @property string $out_text
 * @property string $out_msg
 * @property string $actions
 * @property string $action_status
 * @property string $sms_datetime
 * @property string $default_time
 * @property string $channel
 * @property string $day_of_week
 *
 * The followings are the available model relations:
 * @property ContentIn[] $contentIns
 * @property ContentOut[] $contentOuts
 * @property Definition $sysdef
 * @property Queue[] $queues
 */
class Process extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer sysdef_id
 * @soap
*/
public  $sysdef_id;

/**
 * @var string sub_categ
 * @soap
*/
public  $sub_categ;

/**
 * @var string in_text
 * @soap
*/
public  $in_text;

/**
 * @var string out_text
 * @soap
*/
public  $out_text;

/**
 * @var string out_msg
 * @soap
*/
public  $out_msg;

/**
 * @var string actions
 * @soap
*/
public  $actions;

/**
 * @var string action_status
 * @soap
*/
public  $action_status;

/**
 * @var string sms_datetime
 * @soap
*/
public  $sms_datetime;

/**
 * @var string default_time
 * @soap
*/
public  $default_time;

/**
 * @var string channel
 * @soap
*/
public  $channel;

/**
 * @var string day_of_week
 * @soap
*/
public  $day_of_week;


private $datahelper;
public $check_action = null;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Process','sys_process');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Process the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{       
		return 'sys_process';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
                return array_merge($this->datahelper->getModelRules(),$this->datahelper->getModelSkipPatterns()); 
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		
		 return $this->datahelper->getModelRelations();
														
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		
          			         			         			         			         			         			         			         			         			         			         			         			                  
         return $this->datahelper->getModelAttributes();
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($filter=array())
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

                $strings=$this->datahelper->getModelSearch();
                foreach($strings as $str){
                   //explode params
                   $params=explode(",",$str->params);
                   if($str->method=="compare"){
                      $name=trim($params[0]);
                      if(isset($params[1]))
                      $criteria->compare($name,$this->$name,trim($params[1]));
                      else
                        $criteria->compare($name,$this->$name); 
                   }
                }
                
                 if(is_array($filter) && count($filter)>0){
                    foreach($filter as $key=>$value){
                        $condition= $key."='$value'";
                        $criteria->addCondition($condition);
                    }   
                }
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         function __call($method,$args){
           
            if($method=="getLink"){
               
                ServiceComponent::getValue($this,$args);
            }
           
        }
        public function ajaxServiceBeforePost(&$token){
            $this->sysdef_id = Yii::app()->session->get('current_campaign');
            // $this->channel = 'sms';
        }
         
        
        public function ajaxCustomAfterSave($token){
               
            if($this->check_action == "newrecord"){
                //save event Name
                $eventName = "on".$this->sysdef->name_alias.$this->id;
                $this->actions = $eventName;
                if($this->save(false)){
                    
                    //write event function in MonkEventManager
                            $file = Yii::app()->basePath."/../../yii-1.1.8-config/framework/extensions/configuration/components/".'CMonkEventManager.php';
                           // Open the file to get existing content
                           $current = file_get_contents($file);
                           $current = substr_replace($current, " ",  strpos($current, '} ?>'));
                           
                           $current .= '
//'.$eventName.' event definition.
public function '.$eventName.'($event){$this->raiseEvent(\''.$eventName.'\', $event);}
                               
} ?>';
                    // Write the contents back to the file
                    file_put_contents($file, $current);
                    
                    if($this->sysdef->fk_org_id==1){ 
                        //create a processHandler on the fly
                        $processHandler = new ProcessHandler();
                        $processHandler->process_id = $this->id;
                        $processHandler->handler_name = "ForumSydHandler Handler";
                        $processHandler->model = "ProcessHandler";
                        $processHandler->method = "ForumSydHandler";
                        $processHandler->description = "Handles sms messages for the {$this->sub_categ} process";
                        $processHandler->date_added = date('Y-m-d H:i:s');
                        $processHandler->_status = 1;
                        $processHandler->event_name = $eventName;
                        if($processHandler->save(false)){
                            //post to Kunena as a topic
                            KunenaTopics::model()->postTopic($this);
                        }
                         
                   }
                   
                   //check if to attach an autoresponse handler to this process.
                   if($this->out_text == 'autoresponse'){
                       //create a processHandler on the fly
                        $processHandler = new ProcessHandler();
                        $processHandler->process_id = $this->id;
                        $processHandler->handler_name = "Autoresponse Handler";
                        $processHandler->model = "ProcessHandler";
                        $processHandler->method = "autoResponseHandler";
                        $processHandler->description = "Handles auto response of incoming messages.";
                        $processHandler->date_added = date('Y-m-d H:i:s');
                        $processHandler->_status = 1;
                        $processHandler->event_name = $eventName;
                        $processHandler->save(false);
                   }
                }
            }
            
        }
        
         public function getAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "Process_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Process_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Process";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function getCampaignProcesses(){
            $return = array();
            $id=Yii::app()->session->get('current_campaign');
            $processes=Process::model()->findAllByAttributes(array('sysdef_id'=>$id));
            if($processes){
                foreach($processes as $process){
                    $return[$process->id]=$process->sub_categ;
                }
            }
            return $return;
        }
        
      public function messageProcessor($event){
          
           $controller = $event->params['controller'];
            $minimizediv="dataportlet_expand5";
            $portletdiv="dataportlet5";
            $title="Content Processor";
            $height=150;
            $url=DOMAIN_URL."/index.php?r=process/check";    //Yii::app()->createUrl("process/check");
            
            $data= "<script type='text/javascript'>
                    setInterval(\"ajaxUniversalGetRequest('$url','message-processor-div','id:1,rate:1')\",10000);
                    </script>
                  <div id='message-processor-div'>$url</div>";
            
            $sidebar="right";
            
            
            DataPortlet::showDataPortlet($controller,$portletdiv,$minimizediv,$title,$height,$data,$sidebar);
      }
      
      public function biblequoteHandler($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //send quote to subscriber
          $out_msg=$processor->out_msg;
          SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
          echo "bible quote processed";
      }
      
      public function main(){
          //process incoming  SMS stream
          $this->inComingSMSProcessor();
          
          //process incoming email stream
          $this->inComingEmailProcessor();
          
          //process bulk content sending
          $this->bulkContentProcessor();
          
      }
      
      public function inComingSMSProcessor(){
          //check incoming sms
          $incoming=  SmsIncoming::model()->findAllByAttributes(array('sms_status'=>'pending'));
          if($incoming){
              $criteria=new CDbCriteria();
              $criteria->condition="channel='sms' and in_text != ''";
              $processors=$this->model()->findAll($criteria);
              foreach($incoming as $msgObject){
                  foreach($processors as $processor){
                      //explode message by intext and search for a target process
                      $intext_count=  strlen($processor->in_text);
                      $token =  substr($msgObject->msg, 0, $intext_count);
                                                                   
                      if(strtolower($token) == strtolower($processor->in_text)){   
                        //get subscriber id
                        $subscriber =  Subscriber::model()->getSubscriber($msgObject->source,$processor->sysdef_id); 
                        //log stream content
                        $this->logContentIn($processor,$msgObject,$subscriber->id);
                        
                        //***************** raise process event *********************/
                        //register process handlers of this process
                        $eventName=$processor->actions;
                        $eventManager=new CMonkEventManager();
                        $eventNameArray=array($eventName);
                        $eventManager->init($eventNameArray);
                        
                        //fire  event
                        $event=new CEvent($processor, array('processor'=>$processor,'msgObject'=>$msgObject,'subscriber'=>$subscriber));
                        $eventManager->$eventName($event);
                        
                        //update incoming sms status
                        $msgObject->sms_status='processed';
                        $msgObject->save(false);
                        break;
                      }
                  }
              }
          }
      }
      
      
      public function logContentIn($processor,$msgObject,$subscriber_id,$type='sms'){
          if($type=='email'){
              $checkContentIn=  ContentIn::model()->findByAttributes(array('email_id'=>$msgObject->id));
          }
          else{
              $checkContentIn=  ContentIn::model()->findByAttributes(array('in_msg_id'=>$msgObject->id));
          }
          if(!$checkContentIn){
                $contentIn = new ContentIn();
                $contentIn->subscriber_id=$subscriber_id;
                $contentIn->process_id=$processor->id;
                if($type=='email'){
                    $contentIn->email_id=$msgObject->id;
                    $contentIn->msg_datetime=$msgObject->email_datetime;
                }
                else{
                     $contentIn->in_msg_id=$msgObject->id;
                     $contentIn->msg_datetime=$msgObject->sms_datetime;
                }
                $contentIn->actiontaken=$processor->actions;
                $contentIn->action_status='done';
                $contentIn->save(false);
          }
          
          
      }
      
      public function inComingEmailProcessor(){
          //check incoming emails
          $incoming= EmailIncoming::model()->findAllByAttributes(array('email_status'=>'pending'));
          if($incoming){
              $criteria=new CDbCriteria();
              $criteria->condition="channel='email' and in_text != ''";
              $processors=$this->model()->findAll($criteria);
              foreach($incoming as $msgObject){
                  foreach($processors as $processor){
                      //explode message by intext and search for a target process
                      $intext_count=  strlen($processor->in_text);
                      $token =  substr($msgObject->msg, 0, $intext_count);
                                                                     
                      if($token == $processor->in_text){ 
                        //get subscriber id
                        $subscriber =  Subscriber::model()->getEmailSubscriber($msgObject->source,$processor->sysdef_id); 
                        //log stream content
                        $this->logContentIn($processor,$msgObject,$subscriber->id,'email');
                        
                        //***************** raise process event *********************/
                        //register process handlers of this process
                        $eventName=$processor->actions;           
                        $eventManager=new CMonkEventManager();
                        $eventNameArray=array($eventName);    
                        $eventManager->init($eventNameArray);
                        
                        //fire  event
                        $event=new CEvent($processor, array('processor'=>$processor,'msgObject'=>$msgObject,'subscriber'=>$subscriber));
                        $eventManager->$eventName($event);
                        
                        //update incoming email status
                        $msgObject->email_status='processed';
                        $msgObject->save(false);
                        break;
                      }
                  }
              }
          }
      }
      
      public function emailBibleQuoteHandler($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
         
          //send quote to subscriber
          $out_msg=$processor->out_msg;
          EmailOutgoing::model()->sendEmail($processor, $subscriber->id,$out_msg);
          echo "Email bible quote processed";
      }
      
      public function bulkContentProcessor(){  
          //check schedules and perform scheduling exercise if necessary or do broadcast exercise if preconditions are ready
          $criteria = new CDbCriteria();
          $criteria->condition = "flag=1";
          $broadcasts =  Broadcast::model()->findAll($criteria);
          foreach($broadcasts as $broadcast){ 
             if( strcasecmp($broadcast->last_broadcast_date, date('Y-m-d')) != 0 ){  // this is to avoid rebroadcast on the same day.
              //check weekly and monthly schedules
              if($broadcast->repeat_mode=='weekly' ){
                if(strcasecmp($broadcast->schedule_day_of_week, date('D')) == 0){  
                     $this->broadcastScheduler($broadcast);
                }
              }
              if($broadcast->repeat_mode=='daily'){
                  $this->broadcastScheduler($broadcast);
              }
              if($broadcast->repeat_mode=='one off'){  
                  if($broadcast->broadcast_status == '' ){ 
                     $this->broadcastScheduler($broadcast);
                  }
              }
              
             //check broadcasts
                 //run weekly broadcast
                 if($broadcast->repeat_mode=='weekly' ){
                    if( strcasecmp($broadcast->day_of_week, date('D')) == 0 ){
                           $this->broadcaster($broadcast);
                     }
                 }
                 //run daily broadcast
                if($broadcast->repeat_mode=='daily'){
                    $this->broadcaster($broadcast);
                }
                if($broadcast->repeat_mode=='one off'){
                    if($broadcast->broadcast_status == 0){
                       $this->broadcaster($broadcast);
                    }
                }
             }  
          }
      }
      
      public function broadcastScheduler($broadcast){
          //check time
            $schedule_time_stamp =  strtotime($broadcast->schedule_time);
            $current_time_stamp = strtotime(date('H:i:s'));
            if($schedule_time_stamp <= $current_time_stamp){  
                //check if schedule has not yet been run
                if($broadcast->schedule_status != 1 && ($broadcast->broadcast_status==1 || $broadcast->broadcast_status == '' )){
                    //schedule this broadcast
                    $broadcast->scheduleBroadcast();
                }
            }
      }
      public function broadcaster($broadcast){
          //check time
            $broadcast_time_stamp =  strtotime($broadcast->default_time);
            $current_time_stamp = strtotime(date('H:i:s'));
            if($broadcast_time_stamp <= $current_time_stamp){
                //check if broadcast has not yet been run
                if($broadcast->schedule_status == 1 && $broadcast->broadcast_status==0){
                    //run this broadcast
                    $broadcast->sendBroadcast();
                }
            }
      }
      
      public function setFormScenario(){
            $this->check_action = 'newrecord';
            return 'newrecord';
        }
        
     public function getAutoresponseOptions(){
         return array(
             ''=>'No',
             'autoresponse'=>'Yes'
         );
     }
      
     
      
}

