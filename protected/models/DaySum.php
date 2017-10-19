<?php

/**
 * This is the model class for table "tbl_day_sum".
 *
 * The followings are the available columns in table 'tbl_day_sum':
 * @property integer $id
 * @property string $dt
 * @property integer $count_in
 * @property string $cost_in
 * @property integer $count_out
 * @property string $cost_out
 */
class DaySum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_day_sum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('count_in, count_out', 'numerical', 'integerOnly'=>true),
			array('cost_in, cost_out', 'length', 'max'=>10),
			array('dt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dt, count_in, cost_in, count_out, cost_out', 'safe', 'on'=>'search'),
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
			'dt' => 'Dt',
			'count_in' => 'Count In',
			'cost_in' => 'Cost In',
			'count_out' => 'Count Out',
			'cost_out' => 'Cost Out',
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
		$criteria->compare('dt',$this->dt,true);
		$criteria->compare('count_in',$this->count_in);
		$criteria->compare('cost_in',$this->cost_in,true);
		$criteria->compare('count_out',$this->count_out);
		$criteria->compare('cost_out',$this->cost_out,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DaySum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
