<?php

/**
 * This is the model class for table "email_incoming".
 *
 * The followings are the available columns in table 'email_incoming':
 * @property integer $id
 * @property string $source
 * @property string $email_datetime
 * @property string $msg
 * @property string $email_status
 *
 * The followings are the available model relations:
 * @property SysContentIn[] $sysContentIns
 */
class EmailIncoming extends CActiveRecord
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
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('EmailIncoming','email_incoming');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmailIncoming the static model class
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
		return 'email_incoming';
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
           $gridid = "EmailIncoming_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "EmailIncoming_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "EmailIncoming";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function emailReceiver($event){
            
            
            $controller = $event->params['controller'];
            $minimizediv="dataportlet_expand3";
            $portletdiv="dataportlet3";
            $title="Email Receiver";
            $height=150;
            $url=DOMAIN_URL."/index.php?r=emailIncoming/check";   //Yii::app()->createAbsoluteUrl("emailIncoming/check");
            
            $data= "<script type='text/javascript'>
                    setInterval(\"ajaxUniversalGetRequest('$url','incoming-email-div','id:1,rate:1')\",30000);
                    </script>
                  <div id='incoming-email-div'></div>";
            
            $sidebar="right";
            //check for incoming messages
            //$this->checkIncomingSMS();
            
            DataPortlet::showDataPortlet($controller,$portletdiv,$minimizediv,$title,$height,$data,$sidebar);
            
        }
        
        public function checkIncomingEmail(){
            $eventManager=new CMonkEventManager();
            $eventNameArray=array('onEmailReceiving');
            $eventManager->init($eventNameArray);
            
            $data = "<small> Waiting for incoming email... </small>";
            
            //perform receiving emails.
            $readEmails = new ReadEmail();
            $collection = $readEmails->readEmails();
            if(is_array($collection['emails'])){
                foreach($collection['emails'] as $email) {
                    $data = "An email has been received.";
                    //fire onEmailReceiving event
                    $event=new CEvent($readEmails, array('email'=>$email,'inbox'=>$collection['inbox']));
                    $eventManager->onEmailReceiving($event); 
                }
            }
            /* close the connection */
            imap_close($collection['inbox']);
            
            echo $data;
        }
        
        public function emailReceiving($event){
             //perform necessary receiving procedures
            $email = $event->params['email'];
            $inbox = $event->params['inbox'];
            
            /* get information specific to this email */
            $overview = imap_fetch_overview($inbox,$email,0);
            $message = imap_fetchbody($inbox,$email,2);

            /* insert emails to database table  */
            if($overview[0]->seen == 'unread'){
                $incoming = new EmailIncoming();
                $incoming->source = $overview[0]->from;
                $incoming->email_datetime = $overview[0]->date;
                $incoming->msg = $overview[0]->subject.":".$message;
                $incoming->email_status = 'pending';
                $incoming->save(false);
            }
            
            //delete this email.
            imap_delete($inbox, $email);
            imap_expunge($inbox);
            /*
            $output = '<p> &nbsp; &nbsp; </p> <div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
            $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
            $output.= '<span class="from">'.$overview[0]->from.'</span>';
            $output.= '<span class="date">on '.$overview[0]->date.'</span>';
            $output.= '</div>';
            $output.= '<div class="body">'.$message.'</div> <p> &nbsp; &nbsp; </p>';
             * echo $output;
             * 
             */
            
           
        }
}

