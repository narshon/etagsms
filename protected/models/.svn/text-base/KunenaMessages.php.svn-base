<?php

/**
 * This is the model class for table "c7z4w_kunena_messages".
 *
 * The followings are the available columns in table 'c7z4w_kunena_messages':
 * @property integer $id
 * @property integer $parent
 * @property integer $thread
 * @property integer $catid
 * @property string $name
 * @property integer $userid
 * @property string $email
 * @property string $subject
 * @property integer $time
 * @property string $ip
 * @property integer $topic_emoticon
 * @property integer $locked
 * @property integer $hold
 * @property integer $ordering
 * @property integer $hits
 * @property integer $moved
 * @property integer $modified_by
 * @property integer $modified_time
 * @property string $modified_reason
 */
class KunenaMessages extends KunenaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer parent
 * @soap
*/
public  $parent;

/**
 * @var integer thread
 * @soap
*/
public  $thread;

/**
 * @var integer catid
 * @soap
*/
public  $catid;

/**
 * @var string name
 * @soap
*/
public  $name;

/**
 * @var integer userid
 * @soap
*/
public  $userid;

/**
 * @var string email
 * @soap
*/
public  $email;

/**
 * @var string subject
 * @soap
*/
public  $subject;

/**
 * @var integer time
 * @soap
*/
public  $time;

/**
 * @var string ip
 * @soap
*/
public  $ip;

/**
 * @var integer topic_emoticon
 * @soap
*/
public  $topic_emoticon;

/**
 * @var integer locked
 * @soap
*/
public  $locked;

/**
 * @var integer hold
 * @soap
*/
public  $hold;

/**
 * @var integer ordering
 * @soap
*/
public  $ordering;

/**
 * @var integer hits
 * @soap
*/
public  $hits;

/**
 * @var integer moved
 * @soap
*/
public  $moved;

/**
 * @var integer modified_by
 * @soap
*/
public  $modified_by;

/**
 * @var integer modified_time
 * @soap
*/
public  $modified_time;

/**
 * @var string modified_reason
 * @soap
*/
public  $modified_reason;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('KunenaMessages','c7z4w_kunena_messages');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return KunenaMessages the static model class
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
		return 'c7z4w_kunena_messages';
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
           $gridid = "KunenaMessages_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "KunenaMessages_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "KunenaMessages";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function postTopicMessage($category_id, $topic_id, $process){
            $message = new KunenaMessages();
            $message->parent = 0;
            $message->thread = $topic_id;
            $message->catid =  $category_id;
            $message->name = 'kikaosimu';
            $message->subject = $process->sub_categ;
            $message->time = time();
            if($message->save(false)){
                //add message text
                $messText = new KunenaMessagesText();
                $messText->mesid = $message->id;
                $messText->message = $process->out_msg;
                $messText->save(false);
            }
            
            return $message;
            
        }
        
        public function postMessage($contentIn_id){
            $contentIn = ContentIn::model()->findByPk($contentIn_id);
            if($contentIn){
                $category_id = KunenaCategories::model()->getCategoryID($contentIn->process->sysdef_id);
                $topic_id = KunenaTopics::model()->getTopicID($contentIn->process_id);
                
                $message = new KunenaMessages();
                $message->parent = 0;
                $message->thread = $topic_id;
                $message->catid =  $category_id;
                $message->name = $contentIn->subscriber->username;
                $message->subject =$contentIn->process->sub_categ;
                $message->time = time();
                $message->moved = 0;
                $message->hits = 0;
                $message->ordering = 0;
                if($message->save(false)){
                    //add message text
                    $messText = new KunenaMessagesText();
                    $messText->mesid = $message->id;
                    $messText->message = $contentIn->inMsg->msg;
                    $messText->save(false);
                }
                return $contentIn;
            }
            return false;
        }
        
        public function postOutMessage($contentOut_id){
            $content = ContentOut::model()->findByPk($contentOut_id);
            if($content){
                $category_id = KunenaCategories::model()->getCategoryID($content->process->sysdef_id);
                $topic_id = KunenaTopics::model()->getTopicID($content->process_id);
                
                $message = new KunenaMessages();
                $message->parent = 0;
                $message->thread = $topic_id;
                $message->catid =  $category_id;
                $message->name = 'kikaosimu';
                $message->subject =$content->process->sub_categ;
                $message->time = time();
                $message->moved = 0;
                $message->hits = 0;
                $message->ordering = 0;
                if($message->save(false)){
                    //add message text
                    $messText = new KunenaMessagesText();
                    $messText->mesid = $message->id;
                    $messText->message = $content->outMsg->msg;
                    $messText->save(false);
                }
                return $content;
            }
            return false;
        }
}

