<?php

/**
 * This is the model class for table "tbl_users".
 *
 * The followings are the available columns in table 'tbl_users':
 * @property integer $id
 * @property string $usergroup
 * @property string $username
 * @property string $pass
 * @property string $name1
 * @property string $name2
 * @property string $name3
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $date_added
 * @property string $age
 * @property string $gender
 */
class Users extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string usergroup
 * @soap
*/
public  $usergroup;

/**
 * @var string username
 * @soap
*/
public  $username;

/**
 * @var string pass
 * @soap
*/
public  $pass;

/**
 * @var string name1
 * @soap
*/
public  $name1;

/**
 * @var string name2
 * @soap
*/
public  $name2;

/**
 * @var string name3
 * @soap
*/
public  $name3;

/**
 * @var string email
 * @soap
*/
public  $email;

/**
 * @var string phone
 * @soap
*/
public  $phone;

/**
 * @var string address
 * @soap
*/
public  $address;
public  $date_added;
public  $age;
public  $gender;


private $datahelper;
public $post_group_id;
public $is_admin;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Users','sys_users');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Users the static model class
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
		return 'sys_users';
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
	public function search($filter = array())
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
                $criteria->order = " t.id desc ";
                $criteria->compare('group.group_level3', $this->post_group_id, true);
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
           $gridid = "Users_manageusers";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Users_edit";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Users";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update; //.$delete;
            
        }
        
        public function getUserID($username){
            $user=  Users::model()->findByAttributes(array('username'=>$username));
            if($user){
                return $user->id;
            }
            else{
                return 0;
            }
        }
        
        public function beforeSave(){
            $this->prepareAttributes();
            if($this->isNewRecord){
                $this->date_added=date('Y-m-d H:i:s'); 
                
                if(isset($this->is_admin) && $this->is_admin == 1){ 
                    $this->user_group = "advanced";
                    $this->fk_group_id = 1;
                }
            }
            return true;
        }
        
        public function prepareAttributes(){
           if($this->isNewRecord){
                $campaign_id = Yii::app()->session->get('current_campaign');
                $campaign = Definition::model()->findByPk($campaign_id);
                $this->user_group = "subscriber";
                
                if($campaign)
                  $this->fk_org_id = $campaign->fk_org_id;
               // else
               //    $this->fk_org_id = 1;
                   
                $this->date_added = date("Y-m-d H:i:s");
                $this->pass = md5($this->pass);
            }
            
            //check if pass was changed
            $check = $this->findByPk($this->id);
            if($check){
                if($check->pass != $this->pass){
                    $this->pass = md5($this->pass);
                }
            }
            
        }
        
        public function afterSave(){
            if(isset($this->is_admin) && $this->is_admin == 1){ 
                $newpage = Yii::app()->createAbsoluteUrl("site/login");
                echo CJSON::encode(array(
                                    'div'=>'Done...',
                                    'redirect'=>1,
                                    'newpage'=>$newpage
                                    ));
                exit;
            }
        }
        
        public function authorizeAdvancedUser($username){
            $user = Users::model()->findByAttributes(array('username'=>$username));
            if($user){
                if($user->user_group == "administrator" || $user->user_group == "advanced" ){
                    return true;
                }
                else
                    return false;
            }
        }
        
        public function authorizeAdministratorUser($username){
            if(Yii::app()->user->isGuest){
                return false;
            }
            else{
                $user = Users::model()->findByAttributes(array('username'=>$username));
                if($user){
                    if($user->user_group == "administrator"  ){
                        return true;
                    }
                    else
                        return false;
                }
            }
        }
        
        public function getUserGroupToggle(){
           
                $url = Yii::app()->createAbsoluteUrl("users/elevateuser",array('id'=>$this->id));
                $elevate = CHtml::link("^",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','elevate-div_{$this->id}','id:{$this->id}');"));
                
                $url = Yii::app()->createAbsoluteUrl("users/delevateuser",array('id'=>$this->id));
                $delevate = CHtml::link("<sub> v </sub>",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','elevate-div_{$this->id}','id:{$this->id}');"));
                
                echo "<div id='elevate-div_{$this->id}'>$this->user_group &nbsp; &nbsp; $elevate &nbsp; &nbsp; $delevate </div>";
           
        }
        public function getUserGroupToggleLinks(){
           
                $url = Yii::app()->createAbsoluteUrl("users/elevateuser",array('id'=>$this->id));
                $elevate = CHtml::link("^",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','elevate-div_{$this->id}','id:{$this->id}');"));
                
                $url = Yii::app()->createAbsoluteUrl("users/delevateuser",array('id'=>$this->id));
                $delevate = CHtml::link("<sub> v </sub>",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','elevate-div_{$this->id}','id:{$this->id}');"));
                
                return "<div id='elevate-div_{$this->id}'>$this->user_group &nbsp; &nbsp; $elevate &nbsp; &nbsp; $delevate </div>";
           
        }
        public function elevateuser(){
            $campaign_id = Yii::app()->session->get('current_campaign');
            $user_id = $this->id;
            $campaignOwner = CampaignOwner::model()->findByAttributes(array('service_id'=>$campaign_id,'user_id'=>$user_id));
            
            if($this->user_group =="subscriber"){
                $this->user_group = "office";
                if(!$campaignOwner){
                    $model = new CampaignOwner();
                    $model->service_id = $campaign_id;
                    $model->user_id = $user_id;
                    $model->date_added = date("Y-m-d H:i:s");
                    $model->save(false);
                }
            }
            else if($this->user_group =="office"){
                $this->user_group = "advanced";
                 if(!$campaignOwner){
                    $model = new CampaignOwner();
                    $model->service_id = $campaign_id;
                    $model->user_id = $user_id;
                    $model->date_added = date("Y-m-d H:i:s");
                    $model->save(false);
                }
            }
            else{
                $this->user_group = "subscriber";
            }
            $this->save(false);
            
            $data = $this->getUserGroupToggleLinks();
            
            echo CJSON::encode(array(
                                    'div'=>$data,
                                    ));
           exit;
        }
        public function delevateuser(){
            
            $campaign_id = Yii::app()->session->get('current_campaign');
            $user_id = $this->id;
            $campaignOwner = CampaignOwner::model()->findByAttributes(array('service_id'=>$campaign_id,'user_id'=>$user_id));
            
            if($this->user_group =="office"){
                $this->user_group = "subscriber";
                if($campaignOwner){
                    $campaignOwner->delete();
                }
            }
            else if($this->user_group =="advanced"){
                $this->user_group = "office";
            }
            else{
                $this->user_group = "subscriber";
            }
            $this->save(false);
            
            $data = $this->getUserGroupToggleLinks();
            
            echo CJSON::encode(array(
                                    'div'=>$data,
                                    ));
           exit;
        }
        
        public function getGroups(){
            $campaign_id = Yii::app()->session->get('current_campaign');
            $returnArray = array();
            $def = Definition::model()->findByPk($campaign_id);
            if($def){
                $groups = Group::model()->findAllByAttributes(array('fk_org_id'=>$def->fk_org_id));
                if($groups){
                    foreach($groups as $group){
                        $returnArray[$group->id] = $group->group_level3;
                    }
                }
            }
            return $returnArray;
        }
        
        public function getOrgID(){
            if(isset($_GET['org_id']))
            return $_GET['org_id'];
        }
        
        public function getSuperUserLabel(){
            if(isset($_GET['org_id'])){
                $company = Organisation::model()->findByPk($_GET['org_id']);
                if($company){
                    echo "
                          <div id='super_user_div'>
                          <h3> Create an Admin User Account For Company: {$company->org_name}
                          </div>
                         ";
                }
            }
        }
        
        public function getIsAdmin(){
            if(isset($_GET['org_id']))
            return 1;
        }
        
        public function getUserOrganisationID($username){
            $user = $this->findByAttributes(array('username'=>$username));
            if($user){
                return $user->fk_org_id;
            }
        }
        
        public function uploadFiles($token){
             
            if($token == "importcsv"){
                //CSV_file
                $target_path = Yii::app()->basePath."/../csv/"; 
                $target_path= $target_path . basename( $_FILES['username']['name']);
                if(move_uploaded_file($_FILES['username']['tmp_name'], $target_path)) 
                {   

                    $this->username=basename( $_FILES['username']['name']);
                    $controller = new CController('Users');
                    $this->processCSVImport($target_path);
                    $controller->redirect(array('definition/manageusers'));
                }
            }
        }
        
        public function processCSVImport($file_path){
            $row = 1;
            if (($handle = fopen($file_path, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    //echo "<p> $num fields in line $row: <br /></p>\n";
                    $row++;
                    $fk_org_id = $this->getUserOrganisationID(Yii::app()->user->name);
                    $fk_group_id = $data[0];
                    $names  = $data[1];
                    $age = $data[2];
                    $phone = $data[3];
                    $gender = $data[4];
                                           // echo "Hapa: ".$fk_group_id." : ".$names;exit();
                    //insert user details
                      //check if username doesn't already exist
                      $bool = $this->checkUserExists($names);
                      if(!$bool){
                        $user = new Users();
                        $user->fk_org_id = $fk_org_id;
                        $user->fk_group_id = $fk_group_id;
                        $name_array = explode(' ', $names);
                        $user->username = $names;
                        $user->name1 = $name_array[0];
                        
                        if(isset($name_array[1]))
                        $user->name2 = $name_array[1];
                        
                        if(isset($name_array[2]))
                        $user->name3 = $name_array[2];
                        
                        $user->age = $age;
                        $user->phone = $phone;
                        $user->date_added = date('Y-m-d H:i:s');
                        $user->gender = $gender;
                        $user->save(false);
                      }
                }
                fclose($handle);
            }
            
        }
        
        public function checkUserExists($username){
            $campaign_id = Yii::app()->session->get('current_campaign');
            $campaign = Definition::model()->findByPk($campaign_id);
            if($campaign){
                $check = Users::model()->findByAttributes(array('fk_org_id'=>$campaign->fk_org_id,'username'=>trim($username)));
                if($check){

                    return true;
                }
                else{ 
                    return false;
                }
           }
           else{
               return false;
           }
        }
}

