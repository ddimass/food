<?php

/**
 * This is the model class for table "tbl_claim".
 *
 * The followings are the available columns in table 'tbl_claim':
 * @property integer $id
 * @property string $resolution
 * @property string $description
 * @property integer $tbl_order_id
 *
 * The followings are the available model relations:
 * @property TblOrder $tblOrder
 */
class Claim extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_claim';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resolution, description, tbl_order_id', 'required'),
			array('tbl_order_id', 'numerical', 'integerOnly'=>true),
			array('resolution', 'length', 'max'=>100),
			array('description', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, resolution, description, tbl_order_id', 'safe', 'on'=>'search'),
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
			'resolution' => 'Resolution',
			'description' => 'Description',
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
		$criteria->compare('resolution',$this->resolution,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tbl_order_id',$this->tbl_order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Claim the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
