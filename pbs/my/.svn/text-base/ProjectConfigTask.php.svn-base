<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjectConfigTask
 *
 * @author nngao
 */

require_once "phing/Task.php";

class ProjectConfigTask extends Task {
    /**
     * The message passed in the buildfile.
     */
    private $message = null;
    private $name = null;
    private $base_path = null;
    private $gii_password = null;
    private $db_host = null;
    private $db_database = null;
    private $db_user = null;
    private $db_password = null;
    private $dblog_host = null;
    private $dblog_database = null;
    private $dblog_user = null;
    private $dblog_password = null;
    private $admin_email = null;
    private $domain_url = null;
    private $log_mail_recipient = null;
    private $project_id = null;
    private $redmine_user_id = null;
    private $remote_domain = null;
    private $remote_user = null;
    private $remote_password = null;
    private $remote_database = null;
    private $defaultcontroller = null;
    private $debug_mode = null;
	private $deploy_mode = null;
	
	private $theme = null;
	private $metadb_host = null;
	private $metadb_user = null;
	private $metadb_pass = null;
	private $metadb_db = null;
	private $auth_type = null;
	private $config_mode = null;
	private $code_generation = null;
    

    /**
     * The setter for the attribute "message"
     */
    public function setMessage($message) {
        $this->message = $message;
    }
    /**
     * The setter for the attribute "name"
     */
    public function setName($name) {
        $this->name = $name;
    }
    /**
     * The setter for the attribute "base_path"
     */
    public function setBase_path($base_path) {
        $this->base_path = $base_path;
    }
    /**
     * The setter for the attribute "gii_password"
     */
    public function setGii_password($gii_password) {
        $this->gii_password = $gii_password;
    }
    /**
     * The setter for the attribute "db_host"
     */
    public function setDb_host($db_host) {
        $this->db_host = $db_host;
    }
    /**
     * The setter for the attribute "db_database"
     */
    public function setDb_database($db_database) {
        $this->db_database = $db_database;
    }
    /**
     * The setter for the attribute "db_user"
     */
    public function setDb_user($db_user) {
        $this->db_user = $db_user;
    }
    /**
     * The setter for the attribute "db_password"
     */
    public function setDb_password($db_password) {
        $this->db_password = $db_password;
    }
    /**
     * The setter for the attribute "dblog_host"
     */
    public function setDblog_host($dblog_host) {
        $this->dblog_host = $dblog_host;
    }
    /**
     * The setter for the attribute "dblog_database"
     */
    public function setDblog_database($dblog_database) {
        $this->dblog_database = $dblog_database;
    }
    /**
     * The setter for the attribute "dblog_user"
     */
    public function setDblog_user($dblog_user) {
        $this->dblog_user = $dblog_user;
    }
    /**
     * The setter for the attribute "dblog_password"
     */
    public function setDblog_password($dblog_password) {
        $this->dblog_password = $dblog_password;
    }
    /**
     * The setter for the attribute "admin_email"
     */
    public function setAdmin_email($admin_email) {
        $this->admin_email = $admin_email;
    }
    /**
     * The setter for the attribute "domain_url"
     */
    public function setDomain_url($domain_url) {
        $this->domain_url = $domain_url;
    }
    /**
     * The setter for the attribute "log_mail_recipient"
     */
    public function setLog_mail_recipient($log_mail_recipient) {
        $this->log_mail_recipient = $log_mail_recipient;
    }
    /**
     * The setter for the attribute "project_id"
     */
    public function setProject_id($project_id) {
        $this->project_id = $project_id;
    }
    /**
     * The setter for the attribute "redmine_user_id"
     */
    public function setRedmine_user_id($redmine_user_id) {
        $this->redmine_user_id = $redmine_user_id;
    }
    /**
     * The setter for the attribute "remote_domain"
     */
    public function setRemote_domain($remote_domain) {
        $this->remote_domain = $remote_domain;
    }
    /**
     * The setter for the attribute "remote_user"
     */
    public function setRemote_user($remote_user) {
        $this->remote_user = $remote_user;
    }
    /**
     * The setter for the attribute "remote_password"
     */
    public function setRemote_password($remote_password) {
        $this->remote_password = $remote_password;
    }
    /**
     * The setter for the attribute "remote_database"
     */
    public function setRemote_database($remote_database) {
        $this->remote_database = $remote_database;
    }
    /**
     * The setter for the attribute "default_controller"
     */
    public function setDefaultcontroller($defaultcontroller) {
        $this->defaultcontroller = $defaultcontroller;
    }
    /**
     * The setter for the attribute "debug_mode"
     */
    public function setDebug_mode($debug_mode) {
        $this->debug_mode = $debug_mode;
    }
	
	/**
     * The setter for the attribute "deploy_mode"
     */
    public function setDeploy_mode($deploy_mode) {
        $this->deploy_mode = $deploy_mode;
    }
	
	/**
     * The setter for the attribute "theme"
     */
    public function setTheme($theme) {
        $this->theme = $theme;
    }
	
	/**
     * The setter for the attribute "metadb_host"
     */
    public function setMetadb_host($metadb_host) {
        $this->metadb_host = $metadb_host;
    }
	/**
     * The setter for the attribute "metadb_user"
     */
    public function setMetadb_user($metadb_user) {
        $this->metadb_user = $metadb_user;
    }
	/**
     * The setter for the attribute "metadb_pass"
     */
    public function setMetadb_pass($metadb_pass) {
        $this->metadb_pass = $metadb_pass;
    }
	/**
     * The setter for the attribute "metadb_db"
     */
    public function setMetadb_db($metadb_db) {
        $this->metadb_db = $metadb_db;
    }
	/**
     * The setter for the attribute "auth_type"
     */
    public function setAuth_type($auth_type) {
        $this->auth_type = $auth_type;
    }
	/**
     * The setter for the attribute "config_mode"
     */
    public function setConfig_mode($config_mode) {
        $this->config_mode = $config_mode;
    }
	/**
     * The setter for the attribute "code_generation"
     */
    public function setCode_generation($code_generation) {
        $this->code_generation = $code_generation;
    }
	

    /**
     * The init method: Do init steps.
     */
    public function init() {
      // nothing to do here
    }

    /**
     * The main entry point method.
     */
    public function main() {
        
        //create a config file and append values
        $file=fopen("build/protected/config/config.php", 'w');
        if($file){
            //write into the file
            if(fwrite($file, $this->Configurator())){
                $this->message="Successfully created configuration file";
				if($this->deploy_mode=="launch"){
				   //save config file in actual project path
				   if (!copy("build/protected/config/config.php", "../protected/config/config.php")) {
						echo "failed to copy $file, please move this file manually...\n";
					}
				}
            }
            
            fclose($file);
        }
       echo $this->message;
    }
    
    private function Configurator(){
        $reflect = new ReflectionClass($this);
        $props   = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
        
        $return = "<?php\n/* Configuration constants\n*/ \n";
        foreach ($props as $prop) {
            $var=$prop->getName();
            if($var !="message"){
               $const=strtoupper($var);
               $value=$this->$var;
               $return .= "define(\"$const\",\"$value\"); \n\n"; 
            }
            
        }
        $return .="?>";
        
        
        return $return;
    }
}

?>

