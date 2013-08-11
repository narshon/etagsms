<?php

class SubscriberController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column3', meaning
	 * using three-column layout. See 'protected/views/layouts/column3.php'.
	 */
	public $layout='//layouts/column3';
        public $portlet=array();
        public $portlet_title=array();
        public $portlet_render=array();
        
        public $portletRight=array();
        public $portletRight_title=array();
        public $portletRight_render=array();
        
        public $service;
        public $dataPortlets = array();
        public $dataPortlets_right=array();

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
                      /*  array(
                            'COutputCache',
                            'duration'=>300,
                            //'varyByParam'=>array('id'),
                        ),  */
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{       
                $this->service=new ServiceComponent($this,"Subscriber");
                //$this->service->showAll();
                //$this->service->show();
                
                $adminusers=array();
                array_push($adminusers, 'admin');
                //manual portlets
                Subscriber::model()->showManualPortlets($this);
                
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','monocast','home','smsinbox','smsoutbox','serviceprovider','emailInbox','emailoutbox', 'emailscheduledbroadcasts',
                                                 'scheduledbroadcasts','scheduledmonocasts','managesubs','managebroads','smsdrafts', 'togglesub','smsunprocessed'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>$adminusers,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
                
                
	}
        public function actionemailscheduledbroadcasts(){
            $this->render('emailscheduledbroadcasts');
        }
        public function actionemailoutbox(){
            $this->render('emailoutbox');
        }
        public function actionemailInbox(){
            $this->render('emailInbox');
        }
        public function actionServiceprovider(){
            $this->render('serviceprovider');
        }
        public function actionSmsunprocessed(){
            $this->render('smsunprocessed');
        }
        public function actionTogglesub($id,$action){
            
            Subscriber::model()->performSubscriptionToggle($id,$action);
            
        }
        public function actionsmsdrafts(){
            $this->render('smsdrafts');
        }
        public function actionmanagebroads(){
            $this->render('managebroads');
        }
        public function actionmanagesubs(){
            $this->render('managesubs');
        }
        public function actionscheduledmonocasts(){
            $this->render('scheduledmonocast');
        }
        public function actionscheduledbroadcasts(){
            $this->render('scheduledbroadcast');
        }
        public function actionsmsinbox(){
            $this->render('smsinbox');
        }
        
        public function actionsmsOutbox(){
            $this->render('smsoutbox');
        }
        
        public function actionHome($id=''){
            if($id==''){
                $id = Yii::app()->session->get('current_campaign');
            }
            $this->render('home',array('id'=>$id));
        }
        public function actionMonocast(){
            $this->render('monocast',array(
			'model_id'=>1,
		));
        }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Subscriber;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Subscriber']))
		{
			$model->attributes=$_POST['Subscriber'];
			if($model->save()){
                            if (Yii::app()->request->isAjaxRequest)
                            {
                                echo CJSON::encode(array(
                                    'status'=>'success', 
                                    'div'=>"Grades successfully added"
                                    ));
                                exit;               
                            }
                            else
                                $this->redirect(array('view','id'=>$model->id));
                        }
				
		}
                
                if (Yii::app()->request->isAjaxRequest)
                 {
                    echo CJSON::encode(array(
                        'status'=>'failure', 
                        'div'=>$this->renderPartial('_form', array('model'=>$model), true)));
                    exit;               
                 }
                 else
                    $this->render('create',array('model'=>$model,));
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $row=0)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Subscriber']))
		{
			$model->attributes=$_POST['Subscriber'];
			if($model->save()){
                             if (Yii::app()->request->isAjaxRequest)
                            {
                                $string = $this->service->ajaxResetValidationFields($model,$row);
                                echo CJSON::encode(array(
                                        'div'=>$string."<br/> <p style='color:green'> Record successfully saved! </p>",
                                        ));
                                exit;                 
                            }
                            else
                                $this->redirect(array('view','id'=>$model->id));
                        
                        }
				
		}

		if (Yii::app()->request->isAjaxRequest)
                 {
                    $string = $this->service->ajaxResetValidationFields($model,$row);
                    $string .= $this->service->ajaxShowValidationErrors($model,$row);
                    
                    echo CJSON::encode(array(
                                        'div'=>$string,
                                        ));
                    exit;             
                 }
                 else
		   $this->render('update',array('model'=>$model ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Subscriber');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Subscriber('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Subscriber']))
			$model->attributes=$_GET['Subscriber'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Subscriber::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='subscriber-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

