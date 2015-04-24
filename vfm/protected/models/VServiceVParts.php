<?php

/**
 * This is the model class for table "v_service_v_parts".
 *
 * The followings are the available columns in table 'v_service_v_parts':
 * @property string $v_service_id
 * @property string $v_part_id
 * @property integer $vehicle_part_item
 * @property integer $vehicle_part_quantity
 * @property string $net_price
 * @property string $vat_price
 * @property string $description
 */
class VServiceVParts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_service_v_parts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('v_service_id, v_part_id', 'required'),
                        array('net_price', 'default', 'value'=>0),
                        array('vat_price', 'default', 'value'=>0),
			array('vehicle_part_item, vehicle_part_quantity', 'numerical', 'integerOnly'=>true),
			array('v_service_id, v_part_id, net_price, vat_price', 'length', 'max'=>10),
			array('description', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('v_service_id, v_part_id, vehicle_part_item, vehicle_part_quantity, net_price, vat_price, description', 'safe', 'on'=>'search'),
		);
	}
        //primary key
        public function primaryKey()
        {
            return array('v_service_id', 'v_part_id');
        }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                   'part' => array(self::BELONGS_TO, 'VehicleParts', 'v_part_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'v_service_id' => 'V Service',
			'v_part_id' => 'V Part',
			'vehicle_part_item' => 'Vehicle Part Item',
			'vehicle_part_quantity' => 'Vehicle Part Quantity',
			'net_price' => 'Net Price',
			'vat_price' => 'Vat Price',
			'description' => 'Description',
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

		$criteria->compare('v_service_id',$this->v_service_id,true);
		$criteria->compare('v_part_id',$this->v_part_id,true);
		$criteria->compare('vehicle_part_item',$this->vehicle_part_item);
		$criteria->compare('vehicle_part_quantity',$this->vehicle_part_quantity);
		$criteria->compare('net_price',$this->net_price,true);
		$criteria->compare('vat_price',$this->vat_price,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VServiceVParts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
