<?php

/**
 * This is the model class for table "vehicle".
 *
 * The followings are the available columns in table 'vehicle':
 * @property string $id
 * @property string $license_plate
 * @property integer $running_distance
 * @property string $manufacture_date
 * @property string $registration_date
 * @property string $status
 * @property string $vehicle_type
 * @property string $sector_ekab_id
 *
 * The followings are the available model relations:
 * @property SectorEkab $sectorEkab
 * @property VehicleService[] $vehicleServices
 */
class Vehicle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('running_distance', 'numerical', 'integerOnly'=>true),
			array('license_plate, status, vehicle_type', 'length', 'max'=>45),
			array('sector_ekab_id', 'length', 'max'=>10),
			array('manufacture_date, registration_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, license_plate, running_distance, manufacture_date, registration_date, status, vehicle_type, sector_ekab_id', 'safe', 'on'=>'search'),
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
			'sectorEkab' => array(self::BELONGS_TO, 'SectorEkab', 'sector_ekab_id'),
			'vehicleServices' => array(self::HAS_MANY, 'VehicleService', 'vehicle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'license_plate' => 'License Plate',
			'running_distance' => 'Running Distance',
			'manufacture_date' => 'Manufacture Date',
			'registration_date' => 'Registration Date',
			'status' => 'Status',
			'vehicle_type' => 'Vehicle Type',
			'sector_ekab_id' => 'Sector Ekab',
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
		$criteria->compare('license_plate',$this->license_plate,true);
		$criteria->compare('running_distance',$this->running_distance);
		$criteria->compare('manufacture_date',$this->manufacture_date,true);
		$criteria->compare('registration_date',$this->registration_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('vehicle_type',$this->vehicle_type,true);
		$criteria->compare('sector_ekab_id',$this->sector_ekab_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehicle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
