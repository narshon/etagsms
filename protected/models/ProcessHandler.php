<?php

/**
 * This is the model class for table "sys_process_handler".
 *
 * The followings are the available columns in table 'sys_process_handler':
 * @property integer $id
 * @property integer $process_id
 * @property string $handler_name
 * @property string $model
 * @property string $method
 * @property string $description
 * @property string $date_added
 * @property integer $_status
 */
class ProcessHandler extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer process_id
 * @soap
*/
public  $process_id;

/**
 * @var string handler_name
 * @soap
*/
public  $handler_name;

/**
 * @var string model
 * @soap
*/
public  $model;

/**
 * @var string method
 * @soap
*/
public  $method;

/**
 * @var string description
 * @soap
*/
public  $description;

/**
 * @var string date_added
 * @soap
*/
public  $date_added;

/**
 * @var integer _status
 * @soap
*/
public  $_status;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('ProcessHandler','sys_process_handler');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProcessHandler the static model class
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
		return 'sys_process_handler';
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
                    $con='';
                    foreach($filter as $key=>$value){
                        if($value !='process_id'){
                            $condition= $key."='$value'";
                            $criteria->addCondition($condition);
                        }
                        else{
                               $con .= $value."='$key' ||";
                        }
                    }
                    $con = substr($con, 0, -2);
                    $criteria->condition = $con;
                    
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
           $gridid = "ProcessHandler_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "ProcessHandler_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "ProcessHandler";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
     
    
        
     public function sportsEventHandler($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //send quote to subscriber
          $out_msg=$processor->out_msg;
          SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
          echo "sports quote processed";
      }
      
      public function mmfNewsHandler($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //send quote to subscriber
          $out_msg=$processor->out_msg;
          SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
          echo "mmf news content processed";
      }
      
      public function qouteSubs($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //send quote to subscriber
          $out_msg=$processor->out_msg;
          SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
          echo " news content processed";
      }
      
      public function amaniMessageHandler($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //send quote to subscriber
          $out_msg=$processor->out_msg;
          //SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
          echo " amani content processed";
      }
      
      public function amaniQuestionsBroadcast($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //prepare a broadcast
          
          //fetch broadcast details for this campaign.
          $broadcast= Broadcast::model()->findByAttributes(array('broadcast_name'=>'amani broadcast'));
          if($broadcast){
              $broadcast->sendBroadcast($msgObject->msg);
          }
      }
      
      public function arsenalNewsHandler($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //send quote to subscriber
          $out_msg=$processor->out_msg;
          //SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
          echo " arsenalNews content processed";
      }
      
      public function jJDMachakosHandler($event){
          $processor=$event->params['processor'];
          $msgObject=$event->params['msgObject'];
          $subscriber=$event->params['subscriber'];
          
          //connect to kunena and put discussion
         echo " jJDMachakosHandler content processed";
      }
      
       public function ForumSydHandler($event){
            $processor=$event->params['processor'];
            $msgObject=$event->params['msgObject'];
            $subscriber=$event->params['subscriber'];
            
            //process unsubs
            if( strcasecmp($processor->in_text, 'STOP')==0){
                
                $user = $subscriber->user;
                $subscriber->unsubscribe();
                $subscriber->unsubscribeFromAllCampaigns($user->id);
            }
            //send quote to subscriber
            $out_msg=$processor->out_msg;
            //SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
            echo "{$processor->sub_categ} content processed";
       }
       
       public function autoResponseHandler($event){
            $processor=$event->params['processor'];
            $msgObject=$event->params['msgObject'];
            $subscriber=$event->params['subscriber'];
           
            //send quote to subscriber
            $out_msg=$processor->out_msg;
            //check channel to use
            if($processor->channel == 'sms')
             SmsOutgoing::model()->sendSMS($processor, $subscriber->id,$out_msg);
            else if($processor->channel == 'email')
                EmailOutgoing::model()->sendEmail($processor, $subscriber->id,$out_msg);   
            
            echo "{$processor->sub_categ} - auto response sent";
       }
      
}

