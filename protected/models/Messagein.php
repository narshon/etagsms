<?php

/**
 * This is the model class for table "messagein".
 *
 * The followings are the available columns in table 'messagein':
 * @property integer $Id
 * @property string $SendTime
 * @property string $ReceiveTime
 * @property string $MessageFrom
 * @property string $MessageTo
 * @property string $SMSC
 * @property string $MessageText
 * @property string $MessageType
 * @property string $MessagePDU
 * @property string $Gateway
 * @property string $UserId
 */
class Messagein extends CActiveRecord
{

/**
 * @var integer Id
 * @soap
*/
public  $Id;

/**
 * @var string SendTime
 * @soap
*/
public  $SendTime;

/**
 * @var string ReceiveTime
 * @soap
*/
public  $ReceiveTime;

/**
 * @var string MessageFrom
 * @soap
*/
public  $MessageFrom;

/**
 * @var string MessageTo
 * @soap
*/
public  $MessageTo;

/**
 * @var string SMSC
 * @soap
*/
public  $SMSC;

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
 * @var string MessagePDU
 * @soap
*/
public  $MessagePDU;

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


private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Messagein','messagein');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Messagein the static model class
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
		return 'messagein';
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
           $gridid = "Messagein_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Messagein_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Messagein";
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

