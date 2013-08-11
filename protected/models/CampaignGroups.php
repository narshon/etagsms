<?php

/**
 * This is the model class for table "sys_campaign_groups".
 *
 * The followings are the available columns in table 'sys_campaign_groups':
 * @property integer $id
 * @property integer $service_id
 * @property integer $group_id
 * @property string $date_added
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property Definition $service
 */
class CampaignGroups extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer service_id
 * @soap
*/
public  $service_id;

/**
 * @var integer group_id
 * @soap
*/
public  $group_id;

/**
 * @var string date_added
 * @soap
*/
public  $date_added;


private $datahelper;

public $post_group_id;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('CampaignGroups','sys_campaign_groups');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return CampaignGroups the static model class
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
		return 'sys_campaign_groups';
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
                $criteria->with = "group";
                
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
                
                $criteria->compare('group.group_level3',$this->post_group_id,true);
               
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
           $gridid = "CampaignGroups_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "CampaignGroups_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "CampaignGroups";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view; //.$update.$delete;
            
        }
        
        public function checkCampaignGroup($group_id,$service_id){
            $check = $this->findByAttributes(array('group_id'=>$group_id, 'service_id'=>$service_id));
            if($check)
                return true;
            else
                return false;
        }
        
        public function getCampaignGroups($campaign_id){
            $returnArray = array();
            $groups = $this->findAllByAttributes(array('service_id'=>$campaign_id));
            if($groups){
                foreach($groups as $campaignGroup){
                    $returnArray[$campaignGroup->group_id] = $campaignGroup->group->group_level3;
                }
            }
            
            return $returnArray;
        }
}

