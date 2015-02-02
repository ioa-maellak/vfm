<?php

/**
 * This is the model class for table "vehicle_shift".
 *
 * The followings are the available columns in table 'vehicle_shift':
 * @property string $id
 * @property integer $shift_start_km
 * @property integer $shift_end_km
 * @property integer $shift_used_fuel
 * @property string $shift_start_datetime
 * @property string $shift_end_datetime
 * @property string $vehicle_id
 *
 * The followings are the available model relations:
 * @property Vehicle $vehicle
 */
class VehicleShift extends CActiveRecord
{
	//declare vehicle license plate attribute
        public $vehicle_license_plate;
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_shift';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shift_start_km, shift_end_km, shift_used_fuel', 'numerical', 'integerOnly'=>true),
			array('vehicle_id', 'length', 'max'=>10),
                        array('shift_start_km, vehicle_id', 'required', 'on'=>'create'),
                        array('shift_end_km, shift_used_fuel', 'required', 'on'=>'update'),
			array('shift_start_datetime, shift_end_datetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shift_start_km, shift_end_km, shift_used_fuel, shift_start_datetime, shift_end_datetime, vehicle_id', 'safe', 'on'=>'search'),
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
			'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicle_id'),
                        
		);
	}
        /**
	 * Before save new shift, set current datetime in database format
	 */
        public function beforeSave() {
            //set shift start time in valid database format
            if ($this->isNewRecord){
              $this->shift_start_datetime = new CDbExpression('NOW()');
            }
             
            //set shift end time to mysql current date time format
            if (isset($model->shift_end_datetime)){
                $this->shift_end_datetime = new CDbExpression('NOW()');
            }
           
            return parent::beforeSave();
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'shift_start_km' => 'Shift Start Km',
			'shift_end_km' => 'Shift End Km',
			'shift_used_fuel' => 'Shift Used Fuel',
			'shift_start_datetime' => 'Shift Start Datetime',
			'shift_end_datetime' => 'Shift End Datetime',
			'vehicle_id' => 'Vehicle',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('shift_start_km',$this->shift_start_km);
		$criteria->compare('shift_end_km',$this->shift_end_km);
		$criteria->compare('shift_used_fuel',$this->shift_used_fuel);
		$criteria->compare('shift_start_datetime',$this->shift_start_datetime,true);
		$criteria->compare('shift_end_datetime',$this->shift_end_datetime,true);
		$criteria->compare('vehicle_id',$this->vehicle_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleShift the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
