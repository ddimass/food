<?php

/**
 * This is the model class for table "tbl_prepack_prepack".
 *
 * The followings are the available columns in table 'tbl_prepack_prepack':
 * @property integer $id
 * @property integer $tbl_prepack_id
 * @property integer $prepack_id
 * @property double $count
 *
 * The followings are the available model relations:
 * @property TblPrepack $tblPrepack
 */
class PrepackPrepack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_prepack_prepack';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_prepack_id', 'required'),
			array('tbl_prepack_id, prepack_id', 'numerical', 'integerOnly'=>true),
			array('count', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tbl_prepack_id, prepack_id, count', 'safe', 'on'=>'search'),
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
			'tblPrepack' => array(self::BELONGS_TO, 'TblPrepack', 'tbl_prepack_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tbl_prepack_id' => 'Tbl Prepack',
			'prepack_id' => 'Полуфабрикат',
			'count' => 'Количество',
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
		$criteria->compare('tbl_prepack_id',$this->tbl_prepack_id);
		$criteria->compare('prepack_id',$this->prepack_id);
		$criteria->compare('count',$this->count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrepackPrepack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
