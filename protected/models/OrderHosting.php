<?php

/**
 * This is the model class for table "order_hosting".
 *
 * The followings are the available columns in table 'order_hosting':
 * @property integer $id
 * @property integer $hosting_id
 * @property string $domain
 */
class OrderHosting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderHosting the static model class
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
		return 'order_hosting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hosting_id, domain', 'required'),
			array('hosting_id', 'numerical', 'integerOnly'=>true),
			array('domain', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hosting_id, domain', 'safe', 'on'=>'search'),
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
			'hosting_id' => 'Paket Hosting',
			'domain' => 'Domain',
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
		$criteria->compare('domain',$this->domain,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}