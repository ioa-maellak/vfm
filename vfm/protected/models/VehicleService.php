<?php

/**
 * This is the model class for table "vehicle_service".
 *
 * The followings are the available columns in table 'vehicle_service':
 * @property string $id
 * @property string $service_status
 * @property string $service_date
 * @property string $description
 * @property integer $running_distance
 * @property string $vehicle_part
 * @property integer $vehicle_part_quantity
 * @property string $price
 * @property string $invoice_number
 * @property string $garage
 * @property string $vehicle_id
 *
 * The followings are the available model relations:
 * @property Vehicle $vehicle
 */
class VehicleService extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('running_distance, vehicle_part_quantity', 'numerical', 'integerOnly'=>true),
			array('service_status, vehicle_part, price, invoice_number', 'length', 'max'=>45),
			array('vehicle_id', 'length', 'max'=>10),
			array('service_date, description, garage', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, service_status, service_date, description, running_distance, vehicle_part, vehicle_part_quantity, price, invoice_number, garage, vehicle_id', 'safe', 'on'=>'search'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_status' => 'Service Status',
			'service_date' => 'Service Date',
			'description' => 'Description',
			'running_distance' => 'Running Distance',
			'vehicle_part' => 'Vehicle Part',
			'vehicle_part_quantity' => 'Vehicle Part Quantity',
			'price' => 'Price',
			'invoice_number' => 'Invoice Number',
			'garage' => 'Garage',
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
		$criteria->compare('service_status',$this->service_status,true);
		$criteria->compare('service_date',$this->service_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('running_distance',$this->running_distance);
		$criteria->compare('vehicle_part',$this->vehicle_part,true);
		$criteria->compare('vehicle_part_quantity',$this->vehicle_part_quantity);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('invoice_number',$this->invoice_number,true);
		$criteria->compare('garage',$this->garage,true);
		$criteria->compare('vehicle_id',$this->vehicle_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleService the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
