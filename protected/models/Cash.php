<?php

/**
 * This is the model class for table "tbl_cash".
 *
 * The followings are the available columns in table 'tbl_cash':
 * @property integer $id
 * @property string $day
 * @property string $hall_cost
 * @property integer $hall_count
 * @property integer $hall_p_count
 * @property string $hall_apr_check
 * @property string $deli_cost
 * @property integer $deli_count
 * @property integer $deli_p_count
 * @property string $deli_apr_check
 * @property string $day_cost
 * @property integer $day_count
 * @property integer $day_p_count
 * @property string $day_apr_check
 * @property string $hall_man
 * @property string $hall_man_cost
 * @property string $deli_man
 * @property string $deli_man_cost
 * @property string $desc
 */
class Cash extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cash';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc', 'required'),
			array('hall_count, hall_p_count, deli_count, deli_p_count, day_count, day_p_count', 'numerical', 'integerOnly'=>true),
			array('day', 'length', 'max'=>15),
			array('hall_cost, hall_apr_check, deli_cost, deli_apr_check, day_cost, day_apr_check, hall_man_cost, deli_man_cost', 'length', 'max'=>10),
			array('hall_man, deli_man', 'length', 'max'=>35),
			array('desc', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, day, hall_cost, hall_count, hall_p_count, hall_apr_check, deli_cost, deli_count, deli_p_count, deli_apr_check, day_cost, day_count, day_p_count, day_apr_check, hall_man, hall_man_cost, deli_man, deli_man_cost, desc', 'safe', 'on'=>'search'),
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
			'dt' => 'Дата',
			'day' => 'День недели',
			'hall_cost' => 'Зал выр.',
			'hall_count' => 'Зал кол.',
			'hall_p_count' => 'Зал кол. поз.',
			'hall_apr_check' => 'Зал ср. чек',
			'deli_cost' => 'Дост. выр.',
			'deli_count' => 'Дост. кол.',
			'deli_p_count' => 'Дост. кол. поз.',
			'deli_apr_check' => 'Доставка ср. чек',
			'day_cost' => 'Общая выр.',
			'day_count' => 'Общее кол.',
			'day_p_count' => 'Общее кол. поз.',
			'day_apr_check' => 'Ср. чек',
			'hall_man' => 'Диспетчер',
			'hall_man_cost' => 'Дисп. $$',
			'deli_man' => 'Оператор',
			'deli_man_cost' => 'Опер. $$',
			'desc' => 'Desc',
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
		$criteria->compare('day',$this->day,true);
		$criteria->compare('hall_cost',$this->hall_cost,true);
		$criteria->compare('hall_count',$this->hall_count);
		$criteria->compare('hall_p_count',$this->hall_p_count);
		$criteria->compare('hall_apr_check',$this->hall_apr_check,true);
		$criteria->compare('deli_cost',$this->deli_cost,true);
		$criteria->compare('deli_count',$this->deli_count);
		$criteria->compare('deli_p_count',$this->deli_p_count);
		$criteria->compare('deli_apr_check',$this->deli_apr_check,true);
		$criteria->compare('day_cost',$this->day_cost,true);
		$criteria->compare('day_count',$this->day_count);
		$criteria->compare('day_p_count',$this->day_p_count);
		$criteria->compare('day_apr_check',$this->day_apr_check,true);
		$criteria->compare('hall_man',$this->hall_man,true);
		$criteria->compare('hall_man_cost',$this->hall_man_cost,true);
		$criteria->compare('deli_man',$this->deli_man,true);
		$criteria->compare('deli_man_cost',$this->deli_man_cost,true);
		$criteria->compare('desc',$this->desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=> false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cash the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function pageTotal($provider)
	{
	$total = 0;
	foreach ($provider->data as $item) {
	$total +=$item->day_cost;
	}
		return number_format($total,2,',',' ');
	}
	

}
