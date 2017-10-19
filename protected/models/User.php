<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $name
 * @property string $password
 * @property integer $role
 * @property integer $enable
 * @property integer $tbl_user_id
 * @property string $date
 *
 * The followings are the available model relations:
 * @property TblBlocked[] $tblBlockeds
 * @property TblOrder[] $tblOrders
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, password, role, tbl_user_id, date', 'required'),
			array('role, enable, tbl_user_id', 'numerical', 'integerOnly'=>true),
			array('name, password', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, password, role, enable, tbl_user_id, date', 'safe', 'on'=>'search'),
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
			'tblBlockeds' => array(self::HAS_MANY, 'TblBlocked', 'tbl_user_id'),
			'tblOrders' => array(self::HAS_MANY, 'TblOrder', 'tbl_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'password' => 'Password',
			'role' => 'Role',
			'enable' => 'Enable',
			'tbl_user_id' => 'Tbl User',
			'date' => 'Date',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('enable',$this->enable);
		$criteria->compare('tbl_user_id',$this->tbl_user_id);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
	}
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}
}
