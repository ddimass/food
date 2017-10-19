<?php

/**
 * This is the model class for table "tbl_order_list".
 *
 * The followings are the available columns in table 'tbl_order_list':
 * @property integer $id
 * @property integer $count
 * @property string $description
 * @property integer $tbl_product_id
 * @property integer $tbl_order_id
 *
 * The followings are the available model relations:
 * @property TblProduct $tblProduct
 * @property TblOrder $tblOrder
 */
class OrderList extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_order_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('count, tbl_product_id, tbl_order_id', 'required'),
			array('count, tbl_product_id, tbl_order_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, count, description, tbl_product_id, tbl_order_id', 'safe', 'on'=>'search'),
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
			'tblProduct' => array(self::BELONGS_TO, 'TblProduct', 'tbl_product_id'),
			'tblOrder' => array(self::BELONGS_TO, 'TblOrder', 'tbl_order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'count' => 'Count',
			'description' => 'Description',
			'tbl_product_id' => 'Tbl Product',
			'tbl_order_id' => 'Tbl Order',
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
		$criteria->compare('count',$this->count);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tbl_product_id',$this->tbl_product_id);
		$criteria->compare('tbl_order_id',$this->tbl_order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
