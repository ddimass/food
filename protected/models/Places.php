<?php

/**
 * This is the model class for table "tbl_places".
 *
 * The followings are the available columns in table 'tbl_places':
 * @property integer $id
 * @property string $name
 * @property integer $phone
 * @property string $Address
 * @property string $check_string
 * @property string $desc
 */
class Places extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_places';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('Address', 'length', 'max'=>60),
			array('check_string', 'length', 'max'=>120),
			array('desc', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, phone, Address, check_string, desc', 'safe', 'on'=>'search'),
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
			'name' => 'Название',
			'phone' => 'Телефон',
			'Address' => 'Адрес',
			'check_string' => 'Строка в чек',
			'desc' => 'Описание',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('check_string',$this->check_string,true);
		$criteria->compare('desc',$this->desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Places the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}