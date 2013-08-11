<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutomatedController
 *
 * @author nngao
 */
class AutomatedController extends CController 
{
    public $layout='//layouts/column3';
    public $portlet=array();
    public $portlet_title=array();
    public $portlet_render=array();

    public $portletRight=array();
    public $portletRight_title=array();
    public $portletRight_render=array();
    
    public $breadcrumbs;
    public $service;
    public $menu=array();
    public $dataPortlets = array();
    public $dataPortlets_right=array();
        
    /**
     * @return array action filters
     */
    public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
            );
    }
    
  
    
    	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{       
                
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','hybridcreate','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
   
    public function actionCreate($view, $token='')
    {   
                       
        $additional_params=array(
                                   'form_action_route'=>'automated/create',
                                   'form_action_params'=>array('view'=>$view, 'token'=>$token),
                                );

        $serviceName=Views::model()->getServiceName($view);
        
        if($serviceName){
        $this->service=new ServiceComponent($this, $serviceName); 
        //$this->service->show();
        
        $formArray=$this->service->getCreateForm($view, $additional_params);
        //$form = $formArray['form'];
        $model=$formArray['model'];
        $viewobject = $formArray['viewObject'];
        $modelName = $viewobject->view_model;
        $errors ='';
        
        
        
        if(!isset($_POST["$modelName"])){
                    if ( method_exists ($model ,  "ajaxServiceBeforePost") ){
                        
                         $errors = $model->ajaxServiceBeforePost($token);
                    }
           }
         // Uncomment the following line if AJAX validation is needed
           $this->performAjaxValidation($model,$viewobject->gridid);
           
            if ( method_exists ($model ,  "setFormScenario") ){
             $model->scenario = $model->setFormScenario();
           }
               
                if(isset($_POST["$modelName"]))
                {  
                   $model->attributes=$_POST["$modelName"];
                   if ( method_exists ($model ,  "uploadFiles") ){
                                $model->uploadFiles($token);
                   }
                  
                   if (Yii::app()->request->isAjaxRequest)
                   {   
                         
                       //check for user defined before save implementation. we might not be required to save this record afterall.
                       if ( method_exists ($model ,  "ajaxServiceBeforeSave") ){
                           //$token = "newrecord";     
                           $errors = $model->ajaxServiceBeforeSave($token);   
                           
                           if(!$errors){
                               $newpage = $model->getAjaxRedirectPage($this);
                               echo CJSON::encode(array(
                                        'redirect'=>1, 
                                        'newpage'=>$newpage,
                                        'div'=>'redirecting...',
                                        ));
                                    exit;     
                           }
                       }
                   }
                    if($model->save()){
                         
                          if ( method_exists ($model ,  "ajaxCustomAfterSave") ){
                                        $model->ajaxCustomAfterSave($token);
                          }
                          if(isset($this->module)){
                              $module = $this->module->getName(); 
                              $div = $this->renderPartial("/$module/".lcfirst($modelName)."/view",array('model'=>$model),true,true);
                          }
                          else{
                              $div = $this->renderPartial("../".lcfirst($modelName)."/view",array('model'=>$model),true,true);
                          }
                         
                         if (Yii::app()->request->isAjaxRequest)
                         {
                                // render details view for this save.
                                echo CJSON::encode(array(
                                    'status'=>'success',
                                    'updateGrid'=>1,
                                    'parent_grid'=>$modelName."_hybridgrid",
                                    'div'=>$div,
                                    ));
                                exit;               
                          }
                          else if(isset($_POST['type']) && $_POST['type']=="ajax"){
                               echo "parent_grid=>".$modelName."_hybridgrid"."_'!^*'_".$div; 
                               exit;
                          }
                          else {  
                                //$div = $this->renderPartial("../$modelName/view",array('model'=>$model),true,false); echo $div; //exit;
                                 $this->redirect(array("$modelName/view",'id'=>$model->id));
                          }
                                
                    }
                    
                }
               
                if (Yii::app()->request->isAjaxRequest)
                     {
                        echo CJSON::encode(array(
                            'status'=>'failure', 
                            'div'=>$this->renderPartial('form', array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewobject,'additional_params'=>$additional_params), true,true)));
                        exit;               
                     }
                     else{ 
                        // if($form){
                             if($token=='ajax'){
                                 
                                 $this->renderPartial('form', array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewobject,'additional_params'=>$additional_params));
                             }
                             else if(isset($_POST['type']) && $_POST['type']=="ajax"){
                                 
                                 echo "parent_id=>{$modelName}_hybridgrid_'!^*'_";
                                  
                                 $this->renderPartial('form', array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewobject,'additional_params'=>$additional_params),false, true);
                             }
                             else{
                               $this->render('form', array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewobject,'additional_params'=>$additional_params));  
                             }
                              
                       //  }
                           
                     }
        }
        else {
           throw new CHttpException(400,"$modelName form has been disabled" ); 
        }
        
          
        
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $view the view of the service whose model is to be updated
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($view='',$id='',$token='')
    {   
       ob_start();
       
      $additional_params=array(
                                   'form_action_route'=>'automated/update',
                                   'form_action_params'=>array('view'=>$view,'id'=>$id,'token'=>$token),
                                );
        
        $serviceName=Views::model()->getServiceName($view);
        
        if($serviceName){
        $this->service=new ServiceComponent($this, $serviceName); 
        //$this->service->show();
        
        $formArray=$this->service->getCreateForm($view, $additional_params);
        // $form = $formArray['form'];
        $model=$formArray['model'];
        $viewobject = $formArray['viewObject'];
        $modelName = $viewobject->view_model;
       
        if(!isset($_POST["$modelName"])){
                    if ( method_exists ($model ,  "ajaxServiceBeforePost") ){
                         $errors = $model->ajaxServiceBeforePost($token);
                    }
           }
        
        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model,$viewobject->gridid);
        
                
                if(isset($_POST["$modelName"]))
                {
                    
                $model->attributes=$_POST["$modelName"];
                        //       $gdimage=new GdImage();
                        // $target_path = Yii::app()->basePath."/../images/"; 
                       /* $target_path= $target_path . basename( $_FILES['image_url']['name']);
                        if(move_uploaded_file($_FILES['image_url']['tmp_name'], $target_path)) 
                        {
                            $filename2=basename( $_FILES['image_url']['name']);
                            $filename3 =Yii::app()->baseUrl.'/images/';
                            $filename4 = $filename3.$filename2;
                            
                            $gdimage->generate_image_thumbnail( $source_image_path=$filename4, $thumbnail_image_path=$filename4 );
                            
                            $model->image_url=$filename4;
                            
                        }
                        * 
                        */
                    if($model->save()){
                          
                         if (Yii::app()->request->isAjaxRequest)
                            {   
                                if ( method_exists ($model ,  "AjaxCustomAfterSave") ){
                                        $model->AjaxCustomAfterSave($token);
                                }
                                $strings= ob_get_contents();
                                 ob_end_clean();
                               // render details view for this save.
                               $div = $this->renderPartial("../".lcfirst($modelName)."/view",array('model'=>$model),true,false);
                                echo CJSON::encode(array(
                                    'status'=>'success',
                                    'updateGrid'=>1,
                                    'parent_grid'=>$modelName."_hybridgrid",
                                    'div'=>$strings.$div,
                                    ));
                                exit;               
                            }
                            else {
                               // $div = $this->renderPartial("../$modelName/view",array('model'=>$model),true,false); echo $div; //exit;
                                $this->redirect(array("$modelName/view",'id'=>$model->id));
                            }
                                
                    }
                    
                }
                 
                if (Yii::app()->request->isAjaxRequest)
                     {
                        $strings= ob_get_contents();
                        
                        ob_end_clean();
                        echo CJSON::encode(array(
                            'status'=>'failure', 
                            'div'=>$strings.$this->renderPartial('form', array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewobject,'additional_params'=>$additional_params), true,true),
                            )); 
                        exit;               
                     }
                     else{
                         if($token=='ajax'){ 
                                 $this->renderPartial('form', array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewobject, 'additional_params'=>$additional_params));
                             }
                             else{ 
                               $this->render('form', array('sc'=>$this->service,'model'=>$model,'viewobject'=>$viewobject,'additional_params'=>$additional_params));  
                         }
                     }
        }
        else
          throw new CHttpException(400,"Form has been disabled" );
   
    }
    
    public function actionView($view,$id,$token=''){
        
        $model = new $view();
        $model=$model->findByPk($id);
        
        
        echo $this->renderPartial("../".lcfirst($view)."/view",array('model'=>$model),true,false);
    }
    
    public function actionDelete($model='', $id=''){
        
        
        //perform deletion
        $model =new $model();
        $model = $model->findByPk($id)->delete();

        echo CJSON::encode(array(
                            'status'=>'failure', 
                            'updateGrid'=>1,
                            'closeDialog'=>1,
                            'div'=>"Deleted record id = ".$id." Reload page to update your screen."));
        exit; 
        
    }
    
    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model,$formid)
    {
		if(isset($_POST['ajax']) && $_POST['ajax']===$formid)
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
    }
    
    public function actionHybridcreate($view='',$id=''){
        print "Hapa"; exit;
    }
}

?>