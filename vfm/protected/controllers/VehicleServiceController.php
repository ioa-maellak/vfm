<?php

class VehicleServiceController extends RController
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
	 * Creates a new service model and service vehicle parts model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new VehicleService;
                $partsmodel=new VServiceVParts;
                
                $this->performAjaxValidation(array($model,$partsmodel));
               
                            
                if(isset($_POST['VehicleService'])) {
                    // populate input service data to $model
                    $model->attributes=$_POST['VehicleService'];

                    // validate service model
                    $valid=$model->validate();

                    if($valid)
                    {
                            $model->save(false);
                            //find vehicle for the selected vehicle id and update the next service km field
                            $model->vehicle_nextservice_km = $_POST['VehicleService']['vehicle_nextservice_km'];
                            //find vehicle for the selected vehicle id and update the next service km field
                            $vehicle_id = $model->vehicle_id;
                            $vehicle = Vehicle::model()->findByPK($vehicle_id);
                            $vehicle->nextservice_km = $model->vehicle_nextservice_km;
                            if ($vehicle->save()) {}
                                    
                            // Iterate over each vehicle part from the submitted form
                            
                            if (isset($_POST['VServiceVParts']) && is_array($_POST['VServiceVParts']) && $model->id) {
                                    $i=0;
                                    foreach ($_POST['VServiceVParts']['v_part_id'] as $i=>$VServiceVParts) {
                                           $partsmodel=new VServiceVParts;
                                           $partsmodel->v_service_id = $model->id;
                                           $partsmodel->v_part_id = $_POST['VServiceVParts']['v_part_id'][$i];
                                           $partsmodel->description = $_POST['VServiceVParts']['description'][$i];
                                           $partsmodel->vehicle_part_item = $_POST['VServiceVParts']['vehicle_part_item'][$i];
                                           $partsmodel->vehicle_part_quantity = $_POST['VServiceVParts']['vehicle_part_quantity'][$i];
                                           $partsmodel->net_price = $_POST['VServiceVParts']['net_price'][$i];
                                           $partsmodel->vat_price = $_POST['VServiceVParts']['vat_price'][$i];
                                           $partsmodel->save(true);
                                           $i++;
                                    }  
                            }   
                        Yii::app()->session['tabid'] = 0;
                        // ...redirect to another page
                        $this->redirect(array('view','id'=>$model->id));
                  
                    }
                    else{
                        
                            Yii::app()->session['tabid'] = 0;
                           
                    }
     
                }
                    Yii::app()->session['tabid'] = 0;
                    $this->render('create',array(
			'model'=>$model,
                       'partsmodel'=>$partsmodel,
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
          
                
                if (isset($model->service_date)){
                    $model->service_date = date("d/m/Y", strtotime($model->service_date)) ;
                 }
 		
                // retrieve vehicle parts to be updated in a batch mode
                $vehicle_parts=$this->getVehiclePartsToUpdate($id);
            
                //Get and save each existing or new vehicle parts.
                if (isset($_POST['VServiceVParts']) && is_array($_POST['VServiceVParts']) && $model->id){
                    // if there are no vehicle parts then create vehicle parts 
                    if (count($vehicle_parts)== 0){
                   
                            $vehiclepart=array();
                            $vehicleparts[]=$_POST['VServiceVParts'];
                            $vehiclecounter = 1; 
                            foreach($vehicleparts as $key=>$attributes){
                                      
                                foreach($attributes as $key=>$attribute){
                                        
                                    foreach ($attribute as $id=>$value){
                                   
                                        if ($id == 'v_part_id'){
                                            //if array not empty add part id and save to model 
                                            if (empty($vehiclepart)) { 
                                                $vehiclepart[$id]=$value;
                                            }
                                            else{
                                                    $partsmodel=new VServiceVParts;
                                                    $partsmodel->v_service_id = $model->id;  
                                                    $partsmodel->attributes = $vehiclepart;
                                                    $valid=$partsmodel->validate();
                                                    if($valid) {
                                                        $partsmodel->save();
                                                    }else{
                                                    print_r($partsmodel->getErrors());
                                                    }
                                                    //clear array
                                                    unset($vehiclepart);
                                                    // add next vehicle part id to array;
                                                    $vehiclepart[$id]=$value;
                                            }     
                                       }
                                       else{
                                            
                                            // add last vehicle part
                                            $totalpartvalues= count($attributes);
                                            if ($vehiclecounter >= $totalpartvalues){
                                                 $vehiclepart[$id]=$value; 
                                                 $partsmodel=new VServiceVParts;
                                                 $partsmodel->v_service_id = $model->id;
                                                 $partsmodel->attributes = $vehiclepart; 
                                                 $partsmodel->save();
                                            }
                                            // add other vehicle part attributes
                                            $vehiclepart[$id]=$value; 
                                        }
                                        
                                        
                                    }
                                         
                                        $vehiclecounter++;
                                         
                            }
                        }
                    }
                    //Update vehicle parts.
                    else{
                         $valid=true;
                         foreach($vehicle_parts as $i=>$partsmodel) {                        
                            $partsmodel->attributes=$_POST['VServiceVParts'][$i];
                            $partsmodel->save();
                        }
                    } 
                }
              
                //Get and save service modifications
                if(isset($_POST['VehicleService']))
		{
			$model->attributes=$_POST['VehicleService'];
			if($model->save()){
                                $model->vehicle_nextservice_km = $_POST['VehicleService']['vehicle_nextservice_km'];
                                //find vehicle for the selected vehicle id and update the next service km field
                                $vehicle_id = $model->vehicle_id;
                                $vehicle = Vehicle::model()->findByPK($vehicle_id);
                                $vehicle->nextservice_km = $model->vehicle_nextservice_km;
                                if ($vehicle->save()) 
                                //tab session set to zero.
                               // Yii::app()->session['tabid'] = 0;  
                                //redirect to view page for the current service.
				$this->redirect(array('view','id'=>$model->id));
                        }
		}
                //tab session is set to zero.
                Yii::app()->session['tabid'] = 0; 
                 $this->render('update',array('model'=>$model, 'vehicle_parts'=>$vehicle_parts));
        }
        /*
         * Gets the vehicle parts for a particular service model.
	 * If therea vehicle parts, the array of the vehicle parts is returned to update action.
	 * @param integer $id the ID of the service model to find its vehicle parts.
         */
        public function getVehiclePartsToUpdate($id) {
                // Create an empty list of records
                $vehicle_parts = array();
                // Iterate over each vehicle part from the submitted form
                if (isset($_POST['partsmodel']) && is_array($_POST['partsmodel'])) {
                    foreach ($_POST['partsmodel'] as $partsmodel) {
                        // If item id is available, read the record from database 
                        if ( array_key_exists('v_service_id', $partsmodel) ){
                            $vehicle_parts[] = VServiceVParts::model()->findAllByAttributes(array('v_service_id' => $id) ); 

                        }
                        // Otherwise create a new record
                        else {
                            $vehicle_parts[] = new VServiceVParts();
                        }
                    }
                }
                else
                {
                    $partsmodel = new VServiceVParts();
                    foreach ($partsmodel as $i=>$partsmodel) {
                        $vehicle_part[] = VServiceVParts::model()->findAllByAttributes(array('v_service_id' => $id) );
                    } 
                      //$vehicle_parts is an array of multiple arrays of vehicle atributes.
                      $vehicle_parts_counter=count($vehicle_part);
                      //initialise loop counters.
                      $r=0; 
                      $i=1;
                      //Iterate over each vehicle part attribute and add values to $vehicle_parts array
                      foreach($vehicle_part as $i=>$vehicle_part){
                        //for each column there are values with total number  equal to count(items1) for current column
                        if ($r<count($vehicle_part)){
                        $vehicle_parts[$r]= $vehicle_part[$r];
                        $r=$r+1;
                        }
                    }
                }
                return $vehicle_parts;
        }
	/**
	 * Deletes a particular service model and its vehicle parts.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
                //Find the vehicl.e parts for a particular model and delete them.
                $vehicle_parts=$this->getVehiclePartsToUpdate($id);
                foreach($vehicle_parts as $i=>$partsmodel) {
                       $partsmodel->delete();
                }
                //Delete a particular model
                $this->loadModel($id)->delete();
               

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        //delete parts
        public function actionDeleteParts(array $id)
{
        if(Yii::app()->request->isPostRequest)
        {
                // we only allow deletion via POST request & check if $id is an array
                if(is_array($id))
                {
                        if($this->loadPartsModel($id)->delete())
                        {
                                $this->redirect($_SERVER['HTTP_REFERER']);
                        }
                }
                else
                        throw new CHttpException(400,'ID is not an array.');
        }
        else
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('VehicleService');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VehicleService('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VehicleService']))
			$model->attributes=$_GET['VehicleService'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return VehicleService the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=VehicleService::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function loadPartsModel(array $id)
	{
		
                $partsmodel=VServiceVParts::model()->findByPk($id);
             	if($partsmodel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $partsmodel;
	}
	/**
	 * Performs the AJAX validation.
	 * @param VehicleService $model the model to be validated
	 */
	protected function performAjaxValidation($models)
	{
		
             if(isset($_POST['ajax']) && $_POST['ajax']==='default-parent-form')
            {
                echo CActiveForm::validate($models);
                Yii::app()->end();
            }
         
	}
}
