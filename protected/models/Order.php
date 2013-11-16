<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property string $keterangan
 * @property string $biller_type
 * @property integer $biller_id
 * @property string $update
 * @property integer $status
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, jenis_produk, update, status, start_date, periode', 'required'),
			array('biller_id, status, member_id', 'numerical', 'integerOnly'=>true),
			array('keterangan, biller_type, jenis_produk', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, keterangan, jenis_produk, update, status, start_date, periode, end_date', 'safe', 'on'=>'search'),
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
			'keterangan' => 'Keterangan',
			'biller_type' => 'Biller Type',
			'biller_id' => 'Biller',
			'update' => 'Update',
			'status' => 'Status',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'periode' => 'Periode',
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
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('biller_type',$this->biller_type,true);
		$criteria->compare('biller_id',$this->biller_id);
		$criteria->compare('update',$this->update,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('periode',$this->periode,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getStatus($status=0)
	{
		switch ($status) {
			case 0:
				return 'Tidak Aktif';
				break;

			case 1:
				return 'Aktif';
				break;
			
			case 2:
				return 'Waktunya Perpanjangan';
				break;
			
			case 3:
				return 'Suspend';
				break;
			
			default:
				return 'Tidak Aktif';
				break;
		}
	}
}