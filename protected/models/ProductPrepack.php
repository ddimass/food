<?php

/**
 * This is the model class for table "tbl_product_prepack".
 *
 * The followings are the available columns in table 'tbl_product_prepack':
 * @property integer $tbl_product_id
 * @property integer $tbl_prepack_id
 * @property double $сount
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property TblProduct $tblProduct
 * @property TblPrepack $tblPrepack
 */
class ProductPrepack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_product_prepack';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_product_id, tbl_prepack_id', 'required'),
			array('tbl_product_id, tbl_prepack_id', 'numerical', 'integerOnly'=>true),
			array('count', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tbl_product_id, tbl_prepack_id, count, id', 'safe', 'on'=>'search'),
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
			'tblPrepack' => array(self::BELONGS_TO, 'TblPrepack', 'tbl_prepack_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tbl_product_id' => 'Tbl Product',
			'tbl_prepack_id' => 'Полуфабрикат',
			'count' => 'Количество',
			'id' => 'ID',
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

		$criteria->compare('tbl_product_id',$this->tbl_product_id);
		$criteria->compare('tbl_prepack_id',$this->tbl_prepack_id);
		$criteria->compare('сount',$this->сount);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductPrepack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
