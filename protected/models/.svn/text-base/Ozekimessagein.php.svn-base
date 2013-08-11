<?php

/**
 * This is the model class for table "ozekimessagein".
 *
 * The followings are the available columns in table 'ozekimessagein':
 * @property integer $id
 * @property string $sender
 * @property string $receiver
 * @property string $msg
 * @property string $senttime
 * @property string $receivedtime
 * @property string $operator
 * @property string $msgtype
 * @property string $reference
 */
class Ozekimessagein extends CActiveRecord
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
 * @var string operator
 * @soap
*/
public  $operator;

/**
 * @var string msgtype
 * @soap
*/
public  $msgtype;

/**
 * @var string reference
 * @soap
*/
public  $reference;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Ozekimessagein','ozekimessagein');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ozekimessagein the static model class
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
		return 'ozekimessagein';
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
           $gridid = "Ozekimessagein_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Ozekimessagein_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Ozekimessagein";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function beforeSave(){
            $this->receivedtime = date("Y-m-d H:i:s");
            
            return true;
        }
        
        public function bulkSMSReceiver(){
            //============================================= PHP Mobile Originating code sample =============================================//

            /*
            * 1. Save this script to your Web server.
            *
            * 2. Visit the corresponding URL for the script with your browser, to confirm that it is error-free.
            *
            * 3. Find the resulting logged entry (from error_log() below) in your Web server's error log (not the access log).
            * 
            * 4. Next, set this URL as the MO SMS relay URL via your BulkSMS Profile. Send a repliable Mobile Terminating SMS
            * to your phone, reply to it, and you should see a resulting log entry appear in your error log.
            *
            * When we push a Mobile Originating SMS to your relay URL, your script runs just as if you had visited the script's
            * URL in your Web browser. However, the script's output text that would have been displayed to you in the browser,
            * is simply discarded by our calling process. So if you want to know if we have called your URL successfully, you
            * need to log something (as this example does), or add something to a database, or similar.
            */

            $msisdn = $_REQUEST['msisdn'];
            $sender = $_REQUEST['sender'];
            $message = $_REQUEST['message'];
            
            $ozekiIn = new Ozekimessagein();
            $ozekiIn->sender = $sender;
            $ozekiIn->receiver = $msisdn;
            $ozekiIn->msg = $message;
            $ozekiIn->operator = "BulkSMS.com";
            $ozekiIn->save(false);
            
            $output = "A message with body " . $message . " was sent from " . $sender . " to " . $msisdn ."\n";
            echo $output;
            error_log($output);

            // Print the rest of the pushed parameters:
            foreach ( $_REQUEST as $param => $value ) {
                    echo $param . ": " . $value . "<br />";
            }
        }
}

