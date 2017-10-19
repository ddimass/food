<?php

/**
 * This is the model class for table "tbl_clients".
 *
 * The followings are the available columns in table 'tbl_clients':
 * @property integer $id
 * @property string $name
 * @property integer $tbl_discount_type_id
 * @property integer $blocked
 *
 * The followings are the available model relations:
 * @property TblAddress[] $tblAddresses
 * @property TblBlocked[] $tblBlockeds
 * @property TblDiscountType $tblDiscountType
 * @property TblOrder[] $tblOrders
 * @property TblPhones[] $tblPhones
 */
class Clients extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, tbl_discount_type_id', 'required'),
			array('tbl_discount_type_id, blocked, ord_count', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, tbl_discount_type_id, blocked', 'safe', 'on'=>'search'),
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
			'tblAddresses' => array(self::HAS_MANY, 'TblAddress', 'tbl_clients_id'),
			'tblBlockeds' => array(self::HAS_MANY, 'TblBlocked', 'tbl_clients_id'),
			'tblDiscountType' => array(self::BELONGS_TO, 'TblDiscountType', 'tbl_discount_type_id'),
			'tblOrders' => array(self::HAS_MANY, 'TblOrder', 'tbl_client_id'),
			'tblPhones' => array(self::HAS_MANY, 'Phones', 'tbl_clients_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'tbl_discount_type_id' => 'Скидка',
			'blocked' => 'Блокирован',
			'ord_count'=>'Количество заказов'
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
		$criteria->with = array('tblPhones');
		$criteria->compare('tbl_discount_type_id',$this->tbl_discount_type_id);
		$criteria->compare('blocked',$this->blocked);
		$criteria->compare('ord_count',$this->ord_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clients the static model class
	 */

	public static function ordp($id)
	{
		$client = Clients::model()->findbypk($id);
		$client->ord_count = $client->ord_count + 1;
		return $client->ord_count;
	}
	
	public static function ordc($id)
	{
		$client = Clients::model()->findbypk($id);
//		$client->ord_count  $client->ord_count + 1;
		if ($client) {
		return $client->ord_count; } else
		{
		return 0;}
	}
	
	public static function ordm($id)
	{
		$client = Clients::model()->findbypk($id);
		$client->ord_count = $client->ord_count - 1;
		return $client->ord_count;
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
