<?php

/**
 * This is the model class for table "hosting_price".
 *
 * The followings are the available columns in table 'hosting_price':
 * @property integer $di
 * @property integer $hosting_id
 * @property string $name
 * @property integer $periode
 * @property integer $price
 */
class HostingPrice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HostingPrice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hosting_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hosting_id, name, periode, price', 'required'),
			array('hosting_id, periode, price', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hosting_id, name, periode, price', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hosting_id' => 'Hosting',
			'name' => 'Name',
			'periode' => 'Periode',
			'price' => 'Price',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('hosting_id',$this->hosting_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('periode',$this->periode);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}