<?php

/**
 * This is the model class for table "sys_content_in".
 *
 * The followings are the available columns in table 'sys_content_in':
 * @property integer $id
 * @property integer $subscriber_id
 * @property integer $process_id
 * @property integer $in_msg_id
 * @property integer $email_id
 * @property string $msg_datetime
 * @property string $actiontaken
 * @property string $action_status
 *
 * The followings are the available model relations:
 * @property Subscriber $subscriber
 * @property Process $process
 * @property SmsIncoming $inMsg
 * @property EmailIncoming $email
 * @property ContentReplies[] $contentReplies
 */
class ContentIn extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer subscriber_id
 * @soap
*/
public  $subscriber_id;

/**
 * @var integer process_id
 * @soap
*/
public  $process_id;

/**
 * @var integer in_msg_id
 * @soap
*/
public  $in_msg_id;

/**
 * @var integer email_id
 * @soap
*/
public  $email_id;

/**
 * @var string msg_datetime
 * @soap
*/
public  $msg_datetime;

/**
 * @var string actiontaken
 * @soap
*/
public  $actiontaken;

/**
 * @var string action_status
 * @soap
*/
public  $action_status;


private $datahelper;

public $count;

public $message;

public $contentin_id;
public $post_user_id;

         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('ContentIn','sys_content_in');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return ContentIn the static model class
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
		return 'sys_content_in';
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
                $criteria->with = "subscriber.user";
                
                
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
                        $condition='';
                        $count=count($filter);
                        $i=1;
                        foreach($filter as $key=>$value){
                            if($i < $count)
                             $condition .= $value."='$key' || ";
                            else
                              $condition .= $value."='$key'";

                           $i++;
                        }  
                    $criteria->addCondition($condition);
                  }  
                  $criteria->compare ('user.username', $this->post_user_id, true);
		  $criteria->order = "t.id desc";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                                'pageSize'=>'100',
                        ),
		));
	}
        
         function __call($method,$args){
           
            if($method=="getLink"){
               
                ServiceComponent::getValue($this,$args);
            }
           
        }
        
         public function getAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "ContentIn_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "ContentIn_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "ContentIn";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view; //.$update.$delete;
            
        }
         public function getEmailAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "ContentIn_emailgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "ContentIn_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "ContentIn";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view; //$update.$delete
            
        }
        
        public static function getSMSfilter($campaign_id){
            $filter=array();
            $processes= Process::model()->findAllByAttributes(array('sysdef_id'=>$campaign_id));
            if($processes){
                foreach($processes as $process){
                    if($process->channel == 'sms')
                      $filter[$process->id]="process_id";
                }
            }
            if(!$filter){
                $filter[0]="process_id";
            }
            return $filter;
        }
        
          public static function getEmailfilter($campaign_id){
            $filter=array();
            $processes= Process::model()->findAllByAttributes(array('sysdef_id'=>$campaign_id));
            if($processes){
                foreach($processes as $process){
                    if($process->channel == 'email')
                      $filter[$process->id]="process_id";
                }
            }
            
            if(!$filter){
                $filter[0]="process_id";
            }
            return $filter;
        }
        
        public function getInMsg(){
            if($this->in_msg_id){
                return $this->inMsg->msg;
            }
        }
        
        public function getEmail(){
            if($this->email_id){
                return $this->email->msg;
            }
        }
        
        public function getReplyLink(){
            
            $link = CHtml::link("Reply",array("automated/create",'view'=>'ContentIn_reply','token'=>"actiontaken:reply,id:".$this->id), array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create'));
            echo $link;
        } 
         public function getForwardLink(){
             
            $link = CHtml::link("Forward",array("automated/create",'view'=>'ContentIn_forward','token'=>"actiontaken:forwarded,id:".$this->id), array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create'));
            echo $link;
        }
        
        public function ajaxServiceBeforePost($token){
            $stringArray=WidgetHelper::explode_assoc($token, array(',',':'));
            $this->contentin_id = $stringArray['id'];
            $contentIn = ContentIn::model()->findByPk($this->contentin_id);
            if($contentIn){
                $this->process_id = $contentIn->process_id;
                $this->subscriber_id = $contentIn->subscriber_id;
                $this->in_msg_id = $contentIn->in_msg_id;
                $this->actiontaken = $stringArray['actiontaken'];
                $this->message = $contentIn->inMsg->msg;
            }
        }
        
        public function ajaxServiceBeforeSave($token){
             $stringArray=WidgetHelper::explode_assoc($token, array(',',':'));
            //process request
            $processObject = $this->process;
            
            SmsOutgoing::model()->sendSMS($processObject, $this->subscriber_id, $this->message, $stringArray['actiontaken']);
            
            echo CJSON::encode(array(
                                        'div'=>'Message Sent',
                                        ));
                                    exit;    
            
            return false;
        }
        
        public function getActionStatus(){
            if($this->process->sysdef->fk_org_id==1){
              if($this->action_status=='done'){
                  $url = Yii::app()->createAbsoluteUrl("ContentIn/forumpost");
                    $link = CHtml::link("Post To Forum",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','postforum-div_{$this->id}','id:{$this->id}_rate:5');"));

                    echo "<div id='postforum-div_{$this->id}'".$link."</div>";
              }
              else{
                  echo $this->action_status;
              }
              
            }
            else{
               echo $this->action_status;
            }
        }
        public function updatePost(){
            $this->action_status = "Posted";
            $this->save(false);
            echo CJSON::encode(array( 'div'=>'Posted'));
            exit;  
        }
}

