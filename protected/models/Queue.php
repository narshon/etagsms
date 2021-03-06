<?php

/**
 * This is the model class for table "sys_queue".
 *
 * The followings are the available columns in table 'sys_queue':
 * @property integer $id
 * @property integer $dest
 * @property integer $process_id
 * @property string $msg_datetime
 * @property string $msg
 * @property string $msg_status
 *
 * The followings are the available model relations:
 * @property Subscriber $dest0
 * @property Process $process
 */
class Queue extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer dest
 * @soap
*/
public  $dest;

/**
 * @var integer process_id
 * @soap
*/
public  $process_id;

/**
 * @var string msg_datetime
 * @soap
*/
public  $msg_datetime;

/**
 * @var string msg
 * @soap
*/
public  $msg;

/**
 * @var string msg_status
 * @soap
*/
public  $msg_status;


private $datahelper;
public $post_group_id;
public $post_user_id;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Queue','sys_queue');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Queue the static model class
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
		return 'sys_queue';
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
                $criteria->with = "dest0.user";
                $criteria->with = "dest0.user.group";
                
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
                        if(isset($filter['queue_type'])){
                            $cond = " broadcast_id IS NULL ";
                            $criteria->addCondition($cond);
                            unset($filter['queue_type']);
                            $count--;
                        }
                        if(isset($filter['msg_status'])){
                            $val = $filter['msg_status'];
                            $cond = " msg_status = '$val' ";
                            $criteria->addCondition($cond);
                            unset($filter['msg_status']);
                            $count--;
                        }
                        foreach($filter as $key=>$value){
                          
                           if($i < $count)
                                     $condition .= $value."='$key' || ";
                                    else
                                      $condition .= $value."='$key'";
                           
                           $i++;
                        }  
                    $criteria->addCondition($condition);
                  }
                  $criteria->compare('group.group_level3', $this->post_group_id, true);
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
           $gridid = "Queue_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Queue_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Queue";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
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
        
        public function getSendingDay(){
            return $this->fkBroadcast->getBroadcastDay();
        }
        
        public function getMsgStatus(){
          if($this->flag == 1 && $this->msg_status == "pending"){
                $url = Yii::app()->createAbsoluteUrl("queue/togglerevoke",array('id'=>$this->id,'action'=>'revoke'));
                $link = CHtml::link("Revoke",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','revoke-div_{$this->id}','id:{$this->id}');"));
                echo "<div id='revoke-div_{$this->id}'>".$link."</div>";
            }
          else if($this->flag == 0 && $this->msg_status == "pending"){
              $url = Yii::app()->createAbsoluteUrl("queue/togglerevoke",array('id'=>$this->id,'action'=>'undorevoke'));
                $link = CHtml::link("<small> Undo Revoking </small>",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','revoke-div_{$this->id}','id:{$this->id}');"));
                echo "Revoked <div id='revoke-div_{$this->id}'>".$link."</div>";
          }
            else{
                echo "<div id='revoke-div_{$this->id}'>".$this->msg_status."</div>";
            }
      }
      
      public function getMsgStatusLinks(){
          if($this->flag == 1 && $this->msg_status == "pending"){
                $url = Yii::app()->createAbsoluteUrl("queue/togglerevoke",array('id'=>$this->id,'action'=>'revoke'));
                $link = CHtml::link("Revoke",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','revoke-div_{$this->id}','id:{$this->id}');"));
                return "<div id='revoke-div_{$this->id}'>".$link."</div>";
            }
          else if($this->flag == 0 && $this->msg_status == "pending"){
              $url = Yii::app()->createAbsoluteUrl("queue/togglerevoke",array('id'=>$this->id,'action'=>'undorevoke'));
                $link = CHtml::link("<small> Undo Revoking </small>",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','revoke-div_{$this->id}','id:{$this->id}');"));
                return "Revoked <div id='revoke-div_{$this->id}'>".$link."</div>";
          }
            else{
                return "<div id='revoke-div_{$this->id}'>".$this->msg_status."</div>";
            }
      }
      
      public function performRevokeToggle($id,$action){
            
            $model = Queue::model()->findByPk($id);
            if($model){
                if($action == 'revoke'){
                    $model->flag=0;
                    $model->save(false);
                    $data = $model->getMsgStatusLinks();
                    
                    
                    echo CJSON::encode(array(
                                    'div'=>$data,
                                    ));
                                exit;  
                }
                else if($action == 'undorevoke'){
                    $model->flag=1;
                    $model->save(false);
                    $data = $model->getMsgStatusLinks();
                    
                    
                    echo CJSON::encode(array(
                                    'div'=>$data,
                                    ));
                   exit;
                }
            }
        }
}

