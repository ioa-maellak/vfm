<?php

class VehicleShiftController extends RController
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
                        'rights',
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
                               // 'roles'=>array('user'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
                               // 'actions'=>array('create','checkService'),
				'actions'=>array('create', 'update'),
                                //'roles'=>array('user'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
                               // 'roles'=>array('user'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        /**
	 * Displays alert for the vehicle next service.
	 * This method checks if the vehicle current km is more than the km for the next service
         * If vehicle current km > next service km then alert is diplayed - next service is overdue.
         * else the amount of vehicle current km is between 5000 and 10000 less than the next annual service km 
         * then alert is displayed - next service is due.
	 */
        public function actionCheckNextService() {     
                              
                $vehicle= $_POST['VehicleShift']['vehicle_id']; 
                if($vehicle != ''){
                    //find the selected vehicle's current kilometers and the km for the next annual service
                    $connection=Yii::app()->db;
                    $sql = 'SELECT running_distance, nextservice_km from vehicle  where id= "'.$vehicle.'"';
                    $command=$connection->createCommand($sql);
                    
                    foreach ($command->queryAll()as $value) {
                     $vehicle_km=$value['running_distance'];
                     $next_service_km =$value['nextservice_km'];
                    }
                    //calulate the remaining km for the next annual service
                    $due_km = $next_service_km - $vehicle_km;
                    /*if the selected vehicle total current km is greater than trhe next annual service km
                    * then alert message for service is overdue
                    * else if the remaining km is between 5000 and 10000 then displays alert message for next 
                    * annual service is due
                    */
                    if ($vehicle_km > $next_service_km){
                      echo 'Alert! Service is overdue!';  
                    }
                    elseif ($due_km <= 10000 && $due_km >= 5000 ){
                       echo 'Alert! Service is due in '. $due_km. ' km';   
                    }
                }
                else{
                   echo '';
                }
                
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
                        //find vehicle for the selected vehicle id and update the running distance field
                        $vehicle_id = $model->vehicle_id;
                        $vehicle = Vehicle::model()->findByPK($vehicle_id);
                        $vehicle->running_distance = $model->shift_start_km;
                        $vehicle->save();
                        
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
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
                $model->vehicle_license_plate = $model->vehicle->license_plate;
               
                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        
		if(isset($_POST['VehicleShift']))
		{
			$model->attributes=$_POST['VehicleShift'];
                        // set shift end time to MySql datetime format
                        $model->shift_end_datetime = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$model->shift_end_datetime)));
                        //find vehicle for the selected vehicle id and update the running distance field
                        /*$vehicle_id = $model->vehicle_id;
                        $vehicle = Vehicle::model()->findByPK($vehicle_id);
                        $vehicle->running_distance = $model->shift_end_km;
                        $vehicle->save();*/
			
                         if($model->save(true, array('id', 'shift_start_km', 'shift_end_km', 'shift_used_fuel', 'shift_start_datetime', 'shift_end_datetime', 'vehicle_id')))
				$this->redirect(array('admin','id'=>$model->id));
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
