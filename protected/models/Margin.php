<?php

/**
 * This is the model class for table "tbl_margin".
 *
 * The followings are the available columns in table 'tbl_margin':
 * @property integer $id
 * @property string $dt
 * @property string $name
 * @property integer $count
 * @property string $cost
 * @property string $cost_count
 * @property string $own_cost
 * @property string $own_cost_count
 * @property double $margin
 * @property double $own_margin
 * @property string $desc
 */
class Margin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_margin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('count', 'numerical', 'integerOnly'=>true),
			array('margin, own_margin', 'numerical'),
			array('name', 'length', 'max'=>45),
			array('cost, cost_count, own_cost, own_cost_count', 'length', 'max'=>10),
			array('desc', 'length', 'max'=>40),
			array('dt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dt, name, count, cost, cost_count, own_cost, own_cost_count, margin, own_margin, cat, kitchen', 'safe', 'on'=>'search'),
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
			'name' => 'Продукт',
			'count' => 'Количество',
			'cost' => 'Отпуск. цена',
			'cost_count' => 'Сумма',
			'own_cost' => 'Себестоимость',
			'own_cost_count' => 'Сумма собс.',
			'margin' => 'Наценка %',
			'own_margin' => 'Себ-ть %',
			'margin_cost' => 'Доход Руб.',
			'cat' => 'Категория',
			'kitchen' => 'Кухня',
			'hall_deli' => 'Зал-Доставка',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('count',$this->count);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('cost_count',$this->cost_count,true);
		$criteria->compare('own_cost',$this->own_cost,true);
		$criteria->compare('own_cost_count',$this->own_cost_count,true);
		$criteria->compare('margin',$this->margin);
		$criteria->compare('margin_cost',$this->margin_cost);
		$criteria->compare('own_margin',$this->own_margin);
		$criteria->compare('cat',$this->cat, true);
		$criteria->compare('kitchen',$this->kitchen, true);
		$criteria->compare('hall_deli',$this->hall_deli);
		




		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Margin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function pageTotal($provider,$field)
	{
	$total = 0;
	foreach ($provider->data as $item) {
	$total +=$item->$field;
	}
		return number_format($total,2,',',' ');
	}
}
