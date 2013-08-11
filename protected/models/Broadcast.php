<?php

/**
 * This is the model class for table "sys_broadcast".
 *
 * The followings are the available columns in table 'sys_broadcast':
 * @property integer $id
 * @property integer $process_id
 * @property string $broadcast_name
 * @property string $broadcast_desc
 * @property string $out_text
 * @property string $out_msg
 * @property string $default_time
 * @property string $day_of_week
 * @property integer $flag
 * @property string $repeat_mode
 */
class Broadcast extends CActiveRecord
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
 * @var string broadcast_name
 * @soap
*/
public  $broadcast_name;

/**
 * @var string broadcast_desc
 * @soap
*/
public  $broadcast_desc;

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
 * @var string default_time
 * @soap
*/
public  $default_time;

/**
 * @var string day_of_week
 * @soap
*/
public  $day_of_week;

/**
 * @var integer flag
 * @soap
*/
public  $flag;

/**
 * @var string repeat_mode
 * @soap
*/
public  $repeat_mode;


private $datahelper;
public $mode;
public $form_title1;
public $form_title2;
public $broadcast_groups;
public $url_holder;
public $broadcast_id;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Broadcast','sys_broadcast');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Broadcast the static model class
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
		return 'sys_broadcast';
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
		 $criteria->order = "id desc";
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
           $gridid = "Broadcast_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Broadcast_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Broadcast";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update; //.$delete;
            
        }
        public function getMyAjaxButtons(){
            
            $gridid = "Broadcast_hybridgrid";
            $hybridgridid = "hybridgrid-".$gridid;
            $view_url = Yii::app()->createAbsoluteUrl("automated/view");
            $model = "Broadcast";
            //view
            $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
            echo $view;
            
            //update
            $update_url = Yii::app()->createAbsoluteUrl("automated/update",array('view'=>'Broadcast_form','id'=>$this->id,'token'=>'form1'));
            $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"ajaxFormSubmit('$update_url','$hybridgridid');"));
            echo $update;
        
        }
        
        public function setUrlToken(){
           
            $token = "form1";
         
            return $token;
        }
        public function ajaxServiceBeforePost($token=null){
            $this->url_holder = Yii::app()->createAbsoluteUrl("broadcast/addgroup"); 
        }
        public function beforeSave(){
            if($this->isNewRecord){
               $this->date_added=date('Y-m-d H:i:s');
            }
           return true; 
        }
        
        public function ajaxCustomAfterSave($token){
            if($token == 'form1'){
                $controller = new CController('Broadcast');
                $add_params=array(
                                 'form_action_route' => 'automated/update',
                                 'form_action_params' => array('view'=>'Broadcast_scheduler','id'=>$this->id,'token'=>'form2',)
                             );
                $serviceName=Views::model()->getServiceName("Broadcast_scheduler");
                $sc=new ServiceComponent($controller, $serviceName);
                $formArray = $sc->getCreateForm("Broadcast_scheduler",$add_params);
                $model = $formArray['model'];
                $viewObject = $formArray['viewObject'];
                $model->url_holder = Yii::app()->createAbsoluteUrl("broadcast/addgroup");
                $model->broadcast_id = $model->id;
                $div = $controller->renderPartial('//automated/form',array('sc'=>$sc,'model'=>$model,'viewobject'=>$viewObject,'additional_params'=>$add_params),true,true);
                echo CJSON::encode(array(
                         'status'=>'failure', 
                         'div'=>$div,
                         ));
                     exit; 
            }
        }
        
        public function getDaysOfWeek(){
            return array(
                'mon'=>'Monday',
                'tue'=>'Tuesday',
                'wed'=>'Wednesday',
                'thu'=>'Thursday',
                'fri'=>'Friday',
                'sat'=>'Saturday',
                'sun'=>'Sunday',
            );
        }
        
        public function getCampaignBroadcasts(){
            $id=Yii::app()->session->get('current_campaign');
            $broadcasts=array();
            //get all processes
            $processes=  Process::model()->getCampaignProcesses();
            foreach($processes as $process_id=>$sub_categ){
                //find broadcast details of this process if any
                $broadcasts[] =  Broadcast::model()->findAllByAttributes(array('process_id'=>$process_id));
                
            }
            
            return $broadcasts;
            
        }
        
        public function getInfo(){
            if($this->flag==1)
                $status='On';
            else
                $status='Off';
            
            echo "<div id='broadcast-{$this->id}'>
                 <div style='float:left; width:40%;'> <strong> Broadcast Name: </strong> {$this->broadcast_name} <br> <i> {$this->broadcast_desc} </i>  </div>
                 <div style='float:right; width:40%;'> <strong> Broadcast Mode: </strong> {$this->repeat_mode}, <strong>Status: </strong> $status <br> <strong> Scheduled Day: </strong> {$this->day_of_week},<strong> Time:</strong> {$this->default_time}  </div>
                </div>";
             
        }
        
       public function scheduleBroadcast(){
          //get subs of this broadcast
           $service_id = $this->process->sysdef_id;
           $broadcast_groups = BroadcastGroups::model()->findAllByAttributes(array('fk_broadcast_id'=>$this->id));
           if($broadcast_groups){
               foreach($broadcast_groups as $broadgroup){
                   $subs = Subscriber::model()->getAllServiceSubscribers($service_id); 
                   foreach($subs as $sub){
                       if($sub->user->fk_group_id == $broadgroup->fk_group_id){
                           //check to ensure that this hasn't been scheduled already
                           $check = Queue::model()->findByAttributes(array('dest'=>$sub->id,'broadcast_id'=>$this->id,'msg'=>$this->out_msg));
                           if(!$check){
                                $quee = new Queue();
                                $quee->dest = $sub->id;
                                $quee->process_id = $this->process_id;
                                $quee->msg_datetime = date('Y-m-d H:i:s');
                                $quee->msg = $this->out_msg;
                                $quee->msg_status = 'pending';
                                $quee->broadcast_id = $this->id;
                                $quee->save(false);
                           }
                       }
                  } 
               }
           }
           else{
              $subs = Subscriber::model()->getAllServiceSubscribers($service_id); 
              foreach($subs as $sub){
                  //check to ensure that this hasn't been scheduled already
                   $check = Queue::model()->findByAttributes(array('dest'=>$sub->id,'broadcast_id'=>$this->id,'msg'=>$this->out_msg));
                   if(!$check){
                    $quee = new Queue();
                    $quee->dest = $sub->id;
                    $quee->process_id = $this->process_id;
                    $quee->msg_datetime = date('Y-m-d H:i:s');
                    $quee->msg = $this->out_msg;
                    $quee->msg_status = 'pending';
                    $quee->broadcast_id = $this->id;
                    $quee->save(false);
                  }
               } 
           }
           
           $this->broadcast_status = 0;
           $this->schedule_status = 1;
           $this->save(false);
           
           
      }
      
      public function sendBroadcast($message=''){
          $this->broadcast_status = 1;
          $this->schedule_status = 0;
          $this->last_broadcast_date=date('Y-m-d');
          if($this->save(false)){
            $broadcastMessage ='';

            //get subscribers
            $queues = Queue::model()->findAllByAttributes(array('flag'=>1,'broadcast_id'=>$this->id));
            foreach($queues as $queue){
                if($message){
                      $broadcastMessage = $message;
                 }
                  else{
                      $broadcastMessage = $queue->msg;
                  }
                //fire message to subscriber
                if($this->process->channel == 'sms'){
                   SmsOutgoing::model()->sendSMS($this->process, $queue->dest0->id,$broadcastMessage, $this->broadcast_name);
                }
                else if($this->process->channel == 'email'){
                  EmailOutgoing::model()->sendEmail($this->process, $queue->dest0->id,$broadcastMessage, $this->broadcast_name);
                }

                $queue->msg_status = "sent";
                $queue->save(false);
            }
          }
      }
      
      public function getBroadcastDay(){
          if($this->repeat_mode == 'daily'){
              echo "Daily @ ".$this->default_time;
          }
          if($this->repeat_mode == 'one off'){
              echo "One off @ ".$this->default_time;
          }
          else {
              echo $this->day_of_week." ".$this->default_time; 
          }
      }
      
      public function getStatus(){
          if($this->flag==0){
              return "Off";
          }
          else{
              return "On";
          }
      }
      
      public function getBroadcastSchedule(){
          if($this->repeat_mode == 'daily'){
              return "Daily @ ".$this->schedule_time;
          }
          if($this->repeat_mode == 'one off'){
              return "-";
          }
          else {
              return $this->schedule_day_of_week." ".$this->schedule_time; 
          }
          
      }
      
      public function getFormTitle1(){
          return "<h5> Broadcast Basic Information </h5>";
      }
      
      public function getFormTitle2(){
          return "<h5> Broadcast Scheduling Information </h5>";
      }
      
      public function getRepeatMode(){
          return array(
              'one off'=>'One Off',
              'daily'=>'Daily',
              'weekly'=>'Weekly',
              'Monthly'=>'monthly',
          );
      }
      
      public function getServiceGroups(){
          $return = array();
        
          $groups = CampaignGroups::model()->getCampaignGroups($this->process->sysdef_id);
          foreach($groups as $key=>$value){
              $return[$key] = $value;
          }
           return $return;
      }
      
      
}

