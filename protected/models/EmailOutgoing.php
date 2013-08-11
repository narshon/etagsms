<?php

/**
 * This is the model class for table "email_outgoing".
 *
 * The followings are the available columns in table 'email_outgoing':
 * @property integer $id
 * @property string $dest
 * @property string $email_datetime
 * @property string $msg
 * @property string $email_status
 *
 * The followings are the available model relations:
 * @property SysContentOut[] $sysContentOuts
 */
class EmailOutgoing extends CActiveRecord
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
 * @var string email_datetime
 * @soap
*/
public  $email_datetime;

/**
 * @var string msg
 * @soap
*/
public  $msg;

/**
 * @var string email_status
 * @soap
*/
public  $email_status;


private $datahelper;

public $subscriber_id;
public $process_id;
public $source;
public $post_message;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('EmailOutgoing','email_outgoing');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmailOutgoing the static model class
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
		return 'email_outgoing';
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
           $gridid = "EmailOutgoing_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "EmailOutgoing_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "EmailOutgoing";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function AjaxServiceBeforeSave($token=''){
            //save in outgoing;
            $subscriber=  Subscriber::model()->findByPk($token);
            if($subscriber){
               $this->dest=$subscriber->user->email;  
               $this->email_status='pending'; 
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
            $content->email_id=$this->id;
            $content->msg_datetime=$this->email_datetime;
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

        
        public function emailSender($event){
            
            
            $controller = $event->params['controller'];
            $minimizediv="dataportlet_expand4";
            $portletdiv="dataportlet4";
            $title="Email Sender";
            $height=150;
            $url=DOMAIN_URL."/index.php?r=emailOutgoing/check";  //Yii::app()->createAbsoluteUrl("emailOutgoing/check");
            
            $data= "<script type='text/javascript'>
                    setInterval(\"ajaxUniversalGetRequest('$url','outgoing-email-div','id:1,rate:1')\",30000);
                    </script>
                  <div id='outgoing-email-div'></div>";
            
            $sidebar="left";
            
            
            DataPortlet::showDataPortlet($controller,$portletdiv,$minimizediv,$title,$height,$data,$sidebar);
            
        }
        
        public function checkOutgoingEmail(){
            $eventManager=new CMonkEventManager();
            $eventNameArray=array('onEmailSending');
            $eventManager->init($eventNameArray);
            
            $data = "<small> Waiting for outgoing email... </small>";
            $criteria = new CDbCriteria();
            $criteria->condition = "email_status='pending'";
            $criteria->limit = 5;
            $outgoings= EmailOutgoing::model()->findAll($criteria);
            if($outgoings){
                //some messages have been received
                foreach($outgoings as $outgoing){
                    $data = $outgoing->dest.":<br/>".$outgoing->msg;
                    //fire onEmailSending event
                    $event=new CEvent($outgoing, array('outgoing'=>$outgoing));
                    $eventManager->onEmailSending($event);
                }
            }
            
            echo $data;
        }
        
        public function emailSending($event){
             $outgoing = $event->params['outgoing'];
             //perform email sending procedures
             //send message
            $email = Yii::app()->email;
            $email->to = trim($outgoing->dest);
            $email->from = "EtagService.com <admin@etagservice.com>";
            $email->subject = substr($outgoing->msg, 0, 100);
            $email->message = $outgoing->msg;
            //$email->view = 'index';
            //$email->viewVars = array('var1'=>"Hello",'var2'=>trim($out->address->email));
            if(@$email->send()){
                //update outgoing message as sent.
                $outgoing->email_status='sent'; 
            }
            else {
                $outgoing->email_status='not sent';
            }
            $outgoing->save(false);
        }
        
        public function sendEmail($processor, $subscriber_id,$msg, $actiontaken=''){
            $sub=  Subscriber::model()->findByAttributes(array('id'=>$subscriber_id,'flag'=>1));
            if($sub){
                $Outgoing=new EmailOutgoing();
                $Outgoing->dest = $sub->user->email;
                $Outgoing->email_datetime = date('Y-m-d H:i:s');
                $Outgoing->msg=$msg;
                $Outgoing->email_status='pending';
                $Outgoing->subscriber_id = $subscriber_id;
                if($Outgoing->save(false)){
                    //insert into content out stream
                    $contentOut = new ContentOut();
                    $contentOut->subscriber_id = $subscriber_id;
                    $contentOut->process_id = $processor->id;
                    $contentOut->email_id = $Outgoing->id;
                    $contentOut->msg_datetime = $Outgoing->email_datetime;
                    if($actiontaken == '')
                        $contentOut->actiontaken=$processor->actions;
                    else
                        $contentOut->actiontaken=$actiontaken;
                    
                    $contentOut->action_status="done";
                    $contentOut->save(false);
                }
            }
        }
}

