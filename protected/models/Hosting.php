<?php

/**
 * This is the model class for table "hosting".
 *
 * The followings are the available columns in table 'hosting':
 * @property integer $id
 * @property string $group
 * @property string $paket_name
 * @property string $name
 * @property integer $status
 */
class Hosting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Hosting the static model class
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
		return 'hosting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group, paket_name, name, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('group, name', 'length', 'max'=>100),
			array('paket_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group, paket_name, name, status', 'safe', 'on'=>'search'),
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
			'group' => 'Group',
			'paket_name' => 'Paket Name',
			'name' => 'Name',
			'status' => 'Status',
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
		$criteria->compare('group',$this->group,true);
		$criteria->compare('paket_name',$this->paket_name,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}