<?php

/**
 * This is the model class for table "tbl_blocked".
 *
 * The followings are the available columns in table 'tbl_blocked':
 * @property integer $id
 * @property string $description
 * @property string $date
 * @property integer $tbl_user_id
 * @property integer $tbl_clients_id
 *
 * The followings are the available model relations:
 * @property TblUser $tblUser
 * @property TblClients $tblClients
 */
class Blocked extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_blocked';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, date, tbl_user_id, tbl_clients_id', 'required'),
			array('tbl_user_id, tbl_clients_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, date, tbl_user_id, tbl_clients_id', 'safe', 'on'=>'search'),
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
			'tblUser' => array(self::BELONGS_TO, 'TblUser', 'tbl_user_id'),
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
			'description' => 'Description',
			'date' => 'Date',
			'tbl_user_id' => 'Tbl User',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('tbl_user_id',$this->tbl_user_id);
		$criteria->compare('tbl_clients_id',$this->tbl_clients_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blocked the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
