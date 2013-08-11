<?php

/**
 * This is the model class for table "c7z4w_kunena_categories".
 *
 * The followings are the available columns in table 'c7z4w_kunena_categories':
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property integer $icon_id
 * @property integer $locked
 * @property string $accesstype
 * @property integer $access
 * @property integer $pub_access
 * @property integer $pub_recurse
 * @property integer $admin_access
 * @property integer $admin_recurse
 * @property integer $ordering
 * @property integer $published
 * @property string $channels
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property integer $review
 * @property integer $allow_anonymous
 * @property integer $post_anonymous
 * @property integer $hits
 * @property string $description
 * @property string $headerdesc
 * @property string $class_sfx
 * @property integer $allow_polls
 * @property string $topic_ordering
 * @property integer $numTopics
 * @property integer $numPosts
 * @property integer $last_topic_id
 * @property integer $last_post_id
 * @property integer $last_post_time
 * @property string $params
 */
class KunenaCategories extends KunenaActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer parent_id
 * @soap
*/
public  $parent_id;

/**
 * @var string name
 * @soap
*/
public  $name;

/**
 * @var string alias
 * @soap
*/
public  $alias;

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
 * @var string accesstype
 * @soap
*/
public  $accesstype;

/**
 * @var integer access
 * @soap
*/
public  $access;

/**
 * @var integer pub_access
 * @soap
*/
public  $pub_access;

/**
 * @var integer pub_recurse
 * @soap
*/
public  $pub_recurse;

/**
 * @var integer admin_access
 * @soap
*/
public  $admin_access;

/**
 * @var integer admin_recurse
 * @soap
*/
public  $admin_recurse;

/**
 * @var integer ordering
 * @soap
*/
public  $ordering;

/**
 * @var integer published
 * @soap
*/
public  $published;

/**
 * @var string channels
 * @soap
*/
public  $channels;

/**
 * @var integer checked_out
 * @soap
*/
public  $checked_out;

/**
 * @var string checked_out_time
 * @soap
*/
public  $checked_out_time;

/**
 * @var integer review
 * @soap
*/
public  $review;

/**
 * @var integer allow_anonymous
 * @soap
*/
public  $allow_anonymous;

/**
 * @var integer post_anonymous
 * @soap
*/
public  $post_anonymous;

/**
 * @var integer hits
 * @soap
*/
public  $hits;

/**
 * @var string description
 * @soap
*/
public  $description;

/**
 * @var string headerdesc
 * @soap
*/
public  $headerdesc;

/**
 * @var string class_sfx
 * @soap
*/
public  $class_sfx;

/**
 * @var integer allow_polls
 * @soap
*/
public  $allow_polls;

/**
 * @var string topic_ordering
 * @soap
*/
public  $topic_ordering;

/**
 * @var integer numTopics
 * @soap
*/
public  $numTopics;

/**
 * @var integer numPosts
 * @soap
*/
public  $numPosts;

/**
 * @var integer last_topic_id
 * @soap
*/
public  $last_topic_id;

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
                $this->datahelper = new DataHelper('KunenaCategories','c7z4w_kunena_categories');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return KunenaCategories the static model class
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
		return 'c7z4w_kunena_categories';
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
           $gridid = "KunenaCategories_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "KunenaCategories_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "KunenaCategories";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function addCategory($definition){
            
            $this->parent_id = $definition->parent_id;
            $this->name = $definition->service_name;
            $this->alias = str_replace(" ", "-", $definition->service_name);
            $this->accesstype = 'joomla.group';
            $this->published = 1;
            $this->pub_recurse = 1;
            $this->admin_recurse = 1;
            $this->headerdesc = $definition->short_desc;
            $this->description = $definition->description;
            if($this->save(false)){
                //add alias
                $alias = new KunenaAliases();
                $alias->alias = $this->alias;
                $alias->type = "catid";
                $alias->item = $this->id;
                $alias->state = 1;
                $alias->save(false);
            }
        }
        
        public function getCategoryID($campaign_id){
            $campaign = Definition::model()->findByPk($campaign_id);
            if($campaign){
                $category = $this->findByAttributes(array('name'=>$campaign->service_name));
                if($category){
                    return $category->id;
                }
                else {
                    return 1;
                }
            }
        }
}

