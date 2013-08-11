<?php

/**
 * This is the model class for table "ozekimessageout".
 *
 * The followings are the available columns in table 'ozekimessageout':
 * @property integer $id
 * @property string $sender
 * @property string $receiver
 * @property string $msg
 * @property string $senttime
 * @property string $receivedtime
 * @property string $reference
 * @property string $status
 * @property string $msgtype
 * @property string $operator
 */
class Ozekimessageout extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string sender
 * @soap
*/
public  $sender;

/**
 * @var string receiver
 * @soap
*/
public  $receiver;

/**
 * @var string msg
 * @soap
*/
public  $msg;

/**
 * @var string senttime
 * @soap
*/
public  $senttime;

/**
 * @var string receivedtime
 * @soap
*/
public  $receivedtime;

/**
 * @var string reference
 * @soap
*/
public  $reference;

/**
 * @var string status
 * @soap
*/
public  $status;

/**
 * @var string msgtype
 * @soap
*/
public  $msgtype;

/**
 * @var string operator
 * @soap
*/
public  $operator;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Ozekimessageout','ozekimessageout');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ozekimessageout the static model class
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
		return 'ozekimessageout';
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
	public function search()
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
           $gridid = "Ozekimessageout_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Ozekimessageout_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Ozekimessageout";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function BulkSMSSend(){
            
            //get next 10messages and send them.
            $criteria = new CDbCriteria();
            $criteria->condition = "status = 'send'";
            $criteria->limit = 10;
            $ozekiOutMsgs = Ozekimessageout::model()->findAll($criteria);
            if($ozekiOutMsgs){
                foreach($ozekiOutMsgs as $out){
                    
                    $url = 'http://bulksms.vsms.net/eapi/submission/send_sms/2/2.0';
                    $msisdn = $out->receiver;
                    $data = 'username=vickow&password=achacha&message='.urlencode($out->msg).'&msisdn='.urlencode($msisdn);
                    $out->senttime=date("Y-m-d H:i:s");
                    $response = $this->do_post_request($url, $data);
                    
                    $response_array = explode("|", $response);
                    if($response_array[0]==0){
                        //successful submission
                        $out->status='sent';
                        
                    }
                    else if($response_array[0]==24){
                        $out->status='NumberFormatError';
                    }
                    else{
                        $out->status='Failed';
                    }
                    
                    $out->save(false);
                    
                    print $response;
                    //update sending details
                    
                }
            }
            
        }
        function do_post_request($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded') {
		$params = array('http'      => array(
			'method'       => 'POST',
			'content'      => $data,
			));
		if ($optional_headers !== null) {
			$params['http']['header'] = $optional_headers;
		}
	
		$ctx = stream_context_create($params);


		$response = @file_get_contents($url, false, $ctx);
		if ($response === false) {
			print "Problem reading data from $url, No status returned\n";
		}
	
		return $response;
	}
}

