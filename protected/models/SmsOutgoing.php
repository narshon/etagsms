<?php

/**
 * This is the model class for table "sms_outgoing".
 *
 * The followings are the available columns in table 'sms_outgoing':
 * @property integer $id
 * @property string $dest
 * @property string $sms_datetime
 * @property string $msg
 * @property string $sms_status
 *
 * The followings are the available model relations:
 * @property SysContentOut[] $sysContentOuts
 */
class SmsOutgoing extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string dest
 * @soap
*/
public  $dest;

/**
 * @var string sms_datetime
 * @soap
*/
public  $sms_datetime;

/**
 * @var string msg
 * @soap
*/
public  $msg;

/**
 * @var string sms_status
 * @soap
*/
public  $sms_status;

public $source;

private $datahelper;

public $subscriber_id;
public $process_id;

public $post_message;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('SmsOutgoing','sms_outgoing');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return SmsOutgoing the static model class
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
		return 'sms_outgoing';
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
        
         public function getAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "SmsOutgoing_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "SmsOutgoing_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "SmsOutgoing";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function smsSender($event){
            
            
            $controller = $event->params['controller'];
            $minimizediv="dataportlet_expand2";
            $portletdiv="dataportlet2";
            $title="SMS Sender";
            $height=150;
            $url=DOMAIN_URL."/index.php?r=smsOutgoing/check";  //Yii::app()->createAbsoluteUrl("smsOutgoing/check");
            
            $data= "<script type='text/javascript'>
                    setInterval(\"ajaxUniversalGetRequest('$url','outgoing-sms-div','id:1,rate:1')\",30000);
                    </script>
                  <div id='outgoing-sms-div'></div>";
            
            $sidebar="right";
            //check for incoming messages
            //$this->checkIncomingSMS();
            
            DataPortlet::showDataPortlet($controller,$portletdiv,$minimizediv,$title,$height,$data,$sidebar);
            
        }
        
        public function checkOutgoingSMS(){
            
            $eventManager=new CMonkEventManager();
            $eventNameArray=array('onSMSSending');
            $eventManager->init($eventNameArray);
            
            $data = "<small> Waiting for outgoing sms... </small>";
            $outgoings= SmsOutgoing::model()->findAllByAttributes(array('sms_status'=>'pending'));
            if($outgoings){
                //some messages have been received
                foreach($outgoings as $outgoing){
                    $data = $outgoing->dest.":<br/>".$outgoing->msg;
                    //fire onSMSSending event
                    $event=new CEvent($outgoing, array('outgoing'=>$outgoing,'eventHandlerClass'=>'SmsOutgoing','eventHandlerMethod'=>'smsSending'));
                    $eventManager->onSMSSending($event);
                }
            }
            
            echo $data;
        }
        
        public function smsSending($event){
            
            $outgoing = $event->params['outgoing'];
             //transfer sms to ozeki out table  ----- Ozeki Ng implementation
            /*
            
            $Ozekimessageout = new Ozekimessageout();
            $Ozekimessageout->receiver=$outgoing->dest;
            $Ozekimessageout->receivedtime=$outgoing->sms_datetime;
            $Ozekimessageout->msg=$outgoing->msg;
            $Ozekimessageout->status="send";
            $Ozekimessageout->save(false);
             * 
             */
            //transfer sms to messageout table ---- Diafaan Implementation
            $messageout = new Messageout();
            $messageout->MessageTo = $outgoing->dest;
            $messageout->MessageFrom = $outgoing->source;
            $messageout->MessageText = $outgoing->msg;
            $messageout->UserId = $outgoing->subscriber_id;
            $messageout->Scheduled = date('Y-m-d H:i:s');
            $messageout->save(false);
            //update status in outgoing.
            $outgoing->sms_status="sent";
            $outgoing->save(false);
        }
        
        public function AjaxServiceBeforeSave($token=''){
            //save in outgoing;
            $subscriber=  Subscriber::model()->findByPk($token);
            if($subscriber){
               $this->dest=$subscriber->user->phone;  
               $this->sms_status='pending'; 
               $this->source = $subscriber->service->fkOrg->org_name;
               $this->subscriber_id = $subscriber->id;
            }
            
            return true;
        }
        
        public function AjaxCustomAfterSave($token){
            //save in contentout table
            $content = new ContentOut();
            $content->subscriber_id=$token;
            $content->process_id=$this->process_id;
            $content->out_msg_id=$this->id;
            $content->msg_datetime=$this->sms_datetime;
            $content->actiontaken='monocast';
            $content->action_status='done';
            if($content->save(false)){
                if($this->post_message==1){
                    //post message to forum
                    $contentOut = KunenaMessages::model()->postOutMessage($content->id);
                    if($contentOut){
                        $contentOut->updatePost();
                    }
                }
            }
            
            
           
        }
        
        public function sendSMS($processObject, $subscriber_id,$msg, $actiontaken=''){
            $sub =  Subscriber::model()->findByAttributes(array('id'=>$subscriber_id,'flag'=>1));
            if($sub){
                //check if a similar message has been sent to this user already. Avoid repetition.
                $check = SmsOutgoing::model()->findByAttributes(array('dest'=>$sub->user->phone,'msg'=>$msg,'subscriber_id'=>$subscriber_id));
                if(!$check){
                    $Outgoing=new SmsOutgoing();
                    $Outgoing->dest = $sub->user->phone;
                    $Outgoing->sms_datetime = date('Y-m-d H:i:s');
                    $Outgoing->msg=$msg;
                    $Outgoing->sms_status='pending';
                    $Outgoing->source = $processObject->sysdef->fkOrg->org_name;
                    $Outgoing->subscriber_id = $subscriber_id;
                    if($Outgoing->save(false)){
                        //insert into content out stream
                        $contentOut = new ContentOut();
                        $contentOut->subscriber_id = $subscriber_id;
                        $contentOut->process_id = $processObject->id;
                        $contentOut->out_msg_id = $Outgoing->id;
                        $contentOut->msg_datetime = $Outgoing->sms_datetime;
                        if($actiontaken == '')
                           $contentOut->actiontaken=$processObject->actions;
                        else
                           $contentOut->actiontaken=$actiontaken;

                        $contentOut->action_status="done";
                        $contentOut->save(false);
                    }
                }
            }
        }
        
        public function getPostForumMessageOptions(){
            return array(
                   0=>"No",
                   1=>"Yes"
            );
        }
}

