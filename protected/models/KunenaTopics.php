<?php

/**
 * This is the model class for table "c7z4w_kunena_topics".
 *
 * The followings are the available columns in table 'c7z4w_kunena_topics':
 * @property integer $id
 * @property integer $category_id
 * @property string $subject
 * @property integer $icon_id
 * @property integer $locked
 * @property integer $hold
 * @property integer $ordering
 * @property integer $posts
 * @property integer $hits
 * @property integer $attachments
 * @property integer $poll_id
 * @property integer $moved_id
 * @property integer $first_post_id
 * @property integer $first_post_time
 * @property integer $first_post_userid
 * @property string $first_post_message
 * @property string $first_post_guest_name
 * @property integer $last_post_id
 * @property integer $last_post_time
 * @property integer $last_post_userid
 * @property string $last_post_message
 * @property string $last_post_guest_name
 * @property string $params
 */
class KunenaTopics extends KunenaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer category_id
 * @soap
*/
public  $category_id;

/**
 * @var string subject
 * @soap
*/
public  $subject;

/**
 * @var integer icon_id
 * @soap
*/
public  $icon_id;

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
 * @var integer posts
 * @soap
*/
public  $posts;

/**
 * @var integer hits
 * @soap
*/
public  $hits;

/**
 * @var integer attachments
 * @soap
*/
public  $attachments;

/**
 * @var integer poll_id
 * @soap
*/
public  $poll_id;

/**
 * @var integer moved_id
 * @soap
*/
public  $moved_id;

/**
 * @var integer first_post_id
 * @soap
*/
public  $first_post_id;

/**
 * @var integer first_post_time
 * @soap
*/
public  $first_post_time;

/**
 * @var integer first_post_userid
 * @soap
*/
public  $first_post_userid;

/**
 * @var string first_post_message
 * @soap
*/
public  $first_post_message;

/**
 * @var string first_post_guest_name
 * @soap
*/
public  $first_post_guest_name;

/**
 * @var integer last_post_id
 * @soap
*/
public  $last_post_id;

/**
 * @var integer last_post_time
 * @soap
*/
public  $last_post_time;

/**
 * @var integer last_post_userid
 * @soap
*/
public  $last_post_userid;

/**
 * @var string last_post_message
 * @soap
*/
public  $last_post_message;

/**
 * @var string last_post_guest_name
 * @soap
*/
public  $last_post_guest_name;

/**
 * @var string params
 * @soap
*/
public  $params;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('KunenaTopics','c7z4w_kunena_topics');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return KunenaTopics the static model class
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
		return 'c7z4w_kunena_topics';
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
           $gridid = "KunenaTopics_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "KunenaTopics_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "KunenaTopics";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function postTopic($process){
            $category = KunenaCategories::model()->findByAttributes(array('name'=>$process->sysdef->service_name));
            if($category){   
                   //post first message
                    $topic = new KunenaTopics();
                    $topic->category_id = $category->id;
                    $topic->subject = $process->sub_categ;
                    $topic->posts = 1;
                    $topic->hits = 1;
                    $topic->first_post_time = time();
                    $topic->first_post_message = $process->out_msg;
                    $topic->first_post_guest_name = 'admin';
                    $topic->last_post_time = time();
                    $topic->last_post_message = $process->out_msg;
                    $topic->last_post_guest_name = 'admin';
                    if($topic->save(false)){
                        $message = KunenaMessages::model()->postTopicMessage($category->id,$topic->id,$process);
                        if($message){
                                $topic->first_post_id = $message->id; 
                                $topic->last_post_id = $message->id;
                                $topic->save(false);
                        }
                        
                        //update numTopic
                        $category->numTopics++;
                        $category->save(false);
                    }
            }
        }
        
        public function getTopicID($process_id){
            $process = Process::model()->findByPk($process_id);
            $topic = $this->findByAttributes(array('subject'=>$process->sub_categ));
            if($topic){
                return $topic->id;
            }
            else {
                return 1;
            }
        }
}

