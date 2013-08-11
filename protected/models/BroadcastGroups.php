<?php

/**
 * This is the model class for table "sys_broadcast_groups".
 *
 * The followings are the available columns in table 'sys_broadcast_groups':
 * @property integer $id
 * @property integer $fk_broadcast_id
 * @property integer $fk_group_id
 * @property string $date_added
 *
 * The followings are the available model relations:
 * @property Group $fkGroup
 * @property Broadcast $fkBroadcast
 */
class BroadcastGroups extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer fk_broadcast_id
 * @soap
*/
public  $fk_broadcast_id;

/**
 * @var integer fk_group_id
 * @soap
*/
public  $fk_group_id;

/**
 * @var string date_added
 * @soap
*/
public  $date_added;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('BroadcastGroups','sys_broadcast_groups');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return BroadcastGroups the static model class
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
		return 'sys_broadcast_groups';
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
	public function search($filter)
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
           $gridid = "BroadcastGroups_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "BroadcastGroups_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "BroadcastGroups";
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
            if($this->isNewRecord){
               $this->date_added=date('Y-m-d H:i:s');
            }
           return true; 
        }
        
        public function getGroupName(){
            if(isset($this->fkGroup))
             return $this->fkGroup->group_level3;
        }
        
        public function getRemoveLink(){
            $url = Yii::app()->createAbsoluteUrl("broadcastGroups/remove",array('id'=>$this->id));
            $link = CHtml::link("Remove",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','remove_{$this->id}','id:{$this->id}');"));
            echo "<div id='remove_{$this->id}'>".$link."</div>";
        }
}

