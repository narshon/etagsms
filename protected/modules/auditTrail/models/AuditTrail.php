<?php

/**
 * This is the model class for table "tbl_audit_trail".
 */
class AuditTrail extends MetaActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_audit_trail':
	 * @var integer $id
	 * @var string $new_value
	 * @var string $old_value
	 * @var string $action
	 * @var string $model
	 * @var string $field
	 * @var string $stamp
	 * @var integer $user_id
	 * @var string $model_id
         * @var integer $change_no
         * @var string  $comments
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return AuditTrail the static model class
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
		return 'tbl_audit_trail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('action, model, field, stamp, model_id', 'required'),
			array('action', 'length', 'max'=>255),
			array('model', 'length', 'max'=>255),
			array('field', 'length', 'max'=>255),
                        array('comments', 'safe'),
			array('model_id, change_no', 'length', 'max'=>255),
			array('username', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, new_value, old_value, action, model, field, stamp, username, model_id, regnum', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'old_value' => 'Old Value',
			'new_value' => 'New Value',
			'action' => 'Action',
			'model' => 'Model Name',
			'field' => 'Field',
			'stamp' => 'Stamp',
			'username' => 'User',
			'model_id' => 'Model ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($options = array())
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('old_value',$this->old_value,true);
		$criteria->compare('new_value',$this->new_value,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('model',$this->model);
		$criteria->compare('field',$this->field,true);
		$criteria->compare('stamp',$this->stamp,true);
		$criteria->compare('username',$this->username);
		$criteria->compare('model_id',$this->model_id);
		$criteria->order='t.id desc';
		
		$criteria->mergeWith($this->getDbCriteria());
		return new CActiveDataProvider(
			get_class($this),
			array_merge(
				array(
					'criteria'=>$criteria,
				),
				$options
			)
		);
	}
	
	public function scopes() {
		return array(
			'recently' => array(
				'order' => ' t.stamp DESC ',
			),

		);
	}
        
         public function MenuRenderer(){
            $items = array();
              
            $items = array(
                                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest ),
				array('label'=>'Hi '.Yii::app()->user->name.', (Logout)', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Home', 'url'=>array('/mainpage/index')),
                                array('label'=>'Configuration', 'url'=>array('/configuration/service/admin')),
				
			);
            return $items;
        }
        
        public function beforeSave(){
            $change_no=Yii::app()->session->get('change_no');
            $change_comments=Yii::app()->session->get('change_comments');
            
            if($change_no){
                $this->change_no = $change_no;
                $this->comments = $change_comments;
            }
            
            return true;
        }
}