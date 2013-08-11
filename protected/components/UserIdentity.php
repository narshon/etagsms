<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{	
	private $_id;
		
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		        $auth_type=AUTH_TYPE;
				$authUser=false;
				
				if($auth_type == 0){   // Local Authentication 
			       $users=array(
				                'admin'=>'admin',
						'demo'=>'demo',
							   );
				    if(array_key_exists($this->password, $users)){
					   if($users[$this->password] == $this->username)
					      $authUser=true;
						  $this->_id = $this->username;
					} 
			    }
				
				
				if($auth_type == 1){  // AD authentication
					Yii::import('application.vendors.*');
					require_once('adLDAP/src/adLDAP.php');
					$adldap = new adLDAP();

					$username = $this->username;
					$password = $this->password;

					$authUser = $adldap->authenticate($username, $password);
					$this->_id = $this->username;
                           }
			   
			   if($auth_type == 2){   // Database Authentication 
			       $user=  Users::model()->findByAttributes(array('username'=>$this->username));
				    if(isset($user)){
					   if($user->pass == md5($this->password)){
					       $authUser=true;
						   $this->_id = $user->id;
					   }
					      
					} 
			    }

                if ($authUser === true) {
				
			$this->setAuthorisationSignature($this->username);
			$this->setLoginTimeStamp($this->username);
                        $this->errorCode=self::ERROR_NONE;
                }
                else {    
                 // CAuthenticationLogger::Log($this->username ." attempted to login", $this->username." failed to login on ".date('Y-m-d h:i:s'));
                  $this->errorCode=self::ERROR_USERNAME_INVALID;
                }
                return !$this->errorCode;
	}
	
	public function autoAuthenticate()
	{
                        
            $this->errorCode=self::ERROR_NONE;
                        
            return !$this->errorCode;
	}
	
	public function getId()
    {
            return $this->_id;
    }
	
	public static function setService($service_id){
            
            $this->setState('service', $service_id);
    }
	
	private function setAuthorisationSignature($username){     
	        $perms=array();
            $ac=new AuthorizationComponent();
			$usergroups=$ac->getUserGroups($username);
			

			if(is_array($usergroups)){
			  
			   foreach($usergroups as $group){
				   if($ac->getGroupPerms($group)){   
					 $perms = $perms + $ac->getGroupPerms($group); // array_merge($perms,$ac->getGroupPerms($group)); 
				   } 
			   }
			  
			}
            $this->setState('signature', $perms);
    }
	
	private function setLoginTimeStamp($username){
	    $date = "";
		$date .= date("h:i A");
		$date .= " on, ". jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 );
		$date .= " ".date("d")."-";
		$date .= date("m")."-";
		$date .= date("Y")." ";

		$this->setState('login_time', $date);
	}
        
}
