<?php

class VehicleShiftController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new VehicleShift('create');
                // set shift start datetime to current datetime
                $model->shift_start_datetime = date("d/m/Y H:i:s");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VehicleShift']))
		{
			$model->attributes=$_POST['VehicleShift'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                //if shift end time is null then get current datetime
                 if (!isset($model->shift_end_datetime)){
                       // get current datetime
                      $model->shift_end_datetime = date("d/m/Y H:i:s");
                }
                else{
                    //get datetime from MySql database and change format to day-moth-year & time    
                    $model->shift_end_datetime = date("d/m/Y H:i:s", strtotime($model->shift_end_datetime)) ;
                }
                // To view vehicle license plate - vehicle shift instance accesses its vehicle instance
                 // $model->vehicle_id = $model->vehicle->license_plate;
                  $model->vehicle_license_plate = $model->vehicle->license_plate;
                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                  
		if(isset($_POST['VehicleShift']))
		{
			$model->attributes=$_POST['VehicleShift'];
                        // set shift end time to MySql datetime format
                        $model->shift_end_datetime = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$model->shift_end_datetime)));
                        // set vehicle id to its foreign key value
                       // $model->vehicle_id = $model->vehicle->id;
                        
			if($model->save(true, array('id', 'shift_start_km', 'shift_end_km', 'shift_used_fuel', 'shift_start_datetime', 'shift_end_datetime', 'vehicle_id')))
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('VehicleShift');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VehicleShift('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VehicleShift']))
			$model->attributes=$_GET['VehicleShift'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return VehicleShift the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=VehicleShift::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param VehicleShift $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vehicle-shift-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
