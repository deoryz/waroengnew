<?php

/**
 * This is the model class for table "fb_post".
 *
 * The followings are the available columns in table 'fb_post':
 * @property integer $id
 * @property string $category
 * @property string $text
 * @property string $link
 * @property string $image
 * @property string $date_input
 * @property string $date_modif
 * @property string $date_send
 * @property integer $interval
 * @property integer $jenis
 */
class FbPost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FbPost the static model class
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
		return 'fb_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, jenis', 'required'),
			array('interval, jenis', 'numerical', 'integerOnly'=>true),
			array('category, link, image', 'length', 'max'=>200),
			array('link, referensi, referensi_short', 'url'),
			array('category, text, link, image, date_input, jenis, date_send, referensi, referensi_short', 'safe'),

			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'insert'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category, text, link, image, date_input, date_modif, date_send, interval, jenis', 'safe', 'on'=>'search'),
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
			'category' => 'Category',
			'text' => 'Text',
			'link' => 'Link',
			'image' => 'Image',
			'date_input' => 'Date Input',
			'date_modif' => 'Date Modif',
			'date_send' => 'Date Send',
			'interval' => 'Interval',
			'jenis' => 'Jenis',
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
		$criteria->compare('category',$this->category,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_modif',$this->date_modif,true);
		$criteria->compare('date_send',$this->date_send,true);
		$criteria->compare('interval',$this->interval);
		$criteria->compare('jenis',$this->jenis);
		$criteria->order = 'date_modif DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>25,
			)
		));
	}
}