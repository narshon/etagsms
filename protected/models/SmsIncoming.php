<?php

/**
 * This is the model class for table "sms_incoming".
 *
 * The followings are the available columns in table 'sms_incoming':
 * @property integer $id
 * @property string $source
 * @property string $sms_datetime
 * @property string $msg
 * @property string $sms_status
 *
 * The followings are the available model relations:
 * @property SysContentIn[] $sysContentIns
 */
class SmsIncoming extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string source
 * @soap
*/
public  $source;

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


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('SmsIncoming','sms_incoming');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return SmsIncoming the static model class
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
		return 'sms_incoming';
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
                    
                    if(isset($filter['source']) && $filter['source']!= '0'){
                        $source = $filter['source'];    
                        $condition= "source LIKE '%$source%'";
                        $criteria->addCondition($condition);
                        unset($filter['source']);
                    }
                    else{
                        $condition= "source NOT LIKE '%Safaricom%'";
                        $criteria->addCondition($condition);
                        unset($filter['source']);
                    }
                    foreach($filter as $key=>$value){
                        $condition= $key."='$value'";
                        $criteria->addCondition($condition);
                    }   
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
           $gridid = "SmsIncoming_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "SmsIncoming_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "SmsIncoming";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'deleteDialogMessage("'.$delete_url.'","dialog-content_div","'.$model.'",'.$this->id.'); $("#dialog-id").dialog("open");  return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function smsReceiver($event){
             //transfer sms to incoming table
            $incoming = $event->params['incoming'];
            $incomingSMS = new SmsIncoming();
            $incomingSMS->source=$incoming->MessageFrom;
            $incomingSMS->msg=$incoming->MessageText;
            $incomingSMS->sms_datetime = date('Y-m-d H:i:s');
            $incomingSMS->sms_status="pending";
            $incomingSMS->dest = $incoming->dest_org;
            $incomingSMS->save(false);
            //delete from messagein table
            $incoming->delete();
        }
        
        
        public function smsreceiverEventHandler($event){
            
            
            $controller = $event->params['controller'];
            $minimizediv="dataportlet_expand1";
            $portletdiv="dataportlet1";
            $title="SMS Receiver";
            $height=150;
            $url=DOMAIN_URL."/index.php?r=smsIncoming/check";  //Yii::app()->createAbsoluteUrl("smsIncoming/check");
            
            $data= "<script type='text/javascript'>
                    setInterval(\"ajaxUniversalGetRequest('$url','incoming-sms-div','id:1,rate:1')\",30000);
                    </script>
                  <div id='incoming-sms-div'></div>";
            
            $sidebar="right";
            //check for incoming messages
            //$this->checkIncomingSMS();
            
            DataPortlet::showDataPortlet($controller,$portletdiv,$minimizediv,$title,$height,$data,$sidebar);
            
        }
        
        public function checkIncomingSMS(){
            $eventManager=new CMonkEventManager();
            $eventNameArray=array('onSMSReceived');
            $eventManager->init($eventNameArray);
            
            $data = "<small> Waiting for incoming sms... </small>";
            $IncomingMsg= Messagein::model()->findAll();
            if($IncomingMsg){
                //some messages have been received
                foreach($IncomingMsg as $incoming){
                    $data .= $incoming->MessageFrom.":<br/>".$incoming->MessageText.'<br/><br/>';
                    //fire onSMSReceived event
                    $event=new CEvent($incoming, array('incoming'=>$incoming));
                    $eventManager->onSMSReceived($event);
                }
            }
            
            echo $data;
        }
}

