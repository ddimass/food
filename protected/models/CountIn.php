<?php

/**
 * This is the model class for table "tbl_count_in".
 *
 * The followings are the available columns in table 'tbl_count_in':
 * @property integer $id
 * @property double $count
 * @property string $name
 * @property integer $tbl_unit_id
 *
 * The followings are the available model relations:
 * @property TblUnit $tblUnit
 * @property TblIngred[] $tblIngreds
 */
class CountIn extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_count_in';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_unit_id', 'required'),
			array('tbl_unit_id', 'numerical', 'integerOnly'=>true),
			array('count', 'numerical'),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, count, name, tbl_unit_id', 'safe', 'on'=>'search'),
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
			'tblUnit' => array(self::BELONGS_TO, 'TblUnit', 'tbl_unit_id'),
			'tblIngreds' => array(self::HAS_MANY, 'TblIngred', 'tbl_count_in_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'count' => 'Количество',
			'name' => 'Название',
			'tbl_unit_id' => 'Еденица измерения',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tbl_unit_id',$this->tbl_unit_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CountIn the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
