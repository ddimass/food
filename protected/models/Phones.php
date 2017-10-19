<?php

/**
 * This is the model class for table "tbl_phones".
 *
 * The followings are the available columns in table 'tbl_phones':
 * @property integer $id
 * @property integer $phone
 * @property integer $enable
 * @property integer $tbl_clients_id
 *
 * The followings are the available model relations:
 * @property TblClients $tblClients
 */
class Phones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_phones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone, enable, tbl_clients_id', 'required'),
			array('enable, tbl_clients_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, phone, enable, tbl_clients_id', 'safe', 'on'=>'search'),
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
			'tblClients' => array(self::BELONGS_TO, 'TblClients', 'tbl_clients_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'phone' => 'Телефон',
			'enable' => 'Enable',
			'tbl_clients_id' => 'Tbl Clients',
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
		$criteria->compare('phone',$this->phone);
		$criteria->compare('enable',$this->enable);
		$criteria->compare('tbl_clients_id',$this->tbl_clients_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Phones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
