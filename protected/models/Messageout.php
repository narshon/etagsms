<?php

/**
 * This is the model class for table "messageout".
 *
 * The followings are the available columns in table 'messageout':
 * @property integer $Id
 * @property string $MessageTo
 * @property string $MessageFrom
 * @property string $MessageText
 * @property string $MessageType
 * @property string $Gateway
 * @property string $UserId
 * @property string $UserInfo
 * @property integer $Priority
 * @property string $Scheduled
 * @property integer $IsSent
 * @property integer $IsRead
 */
class Messageout extends CActiveRecord
{

/**
 * @var integer Id
 * @soap
*/
public  $Id;

/**
 * @var string MessageTo
 * @soap
*/
public  $MessageTo;

/**
 * @var string MessageFrom
 * @soap
*/
public  $MessageFrom;

/**
 * @var string MessageText
 * @soap
*/
public  $MessageText;

/**
 * @var string MessageType
 * @soap
*/
public  $MessageType;

/**
 * @var string Gateway
 * @soap
*/
public  $Gateway;

/**
 * @var string UserId
 * @soap
*/
public  $UserId;

/**
 * @var string UserInfo
 * @soap
*/
public  $UserInfo;

/**
 * @var integer Priority
 * @soap
*/
public  $Priority;

/**
 * @var string Scheduled
 * @soap
*/
public  $Scheduled;

/**
 * @var integer IsSent
 * @soap
*/
public  $IsSent;

/**
 * @var integer IsRead
 * @soap
*/
public  $IsRead;


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Messageout','messageout');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Messageout the static model class
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
		return 'messageout';
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
           $gridid = "Messageout_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Messageout_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Messageout";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
}

