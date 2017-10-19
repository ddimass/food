<?php

/**
 * This is the model class for table "tbl_order_temp".
 *
 * The followings are the available columns in table 'tbl_order_temp':
 * @property integer $random
 * @property integer $tbl_product_id
 * @property integer $count
 * @property string $price
 * @property string $cost
 */
class OrderTemp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_order_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('random, tbl_product_id', 'required'),
			array('random, tbl_product_id, count', 'numerical', 'integerOnly'=>true),
			array('price, cost', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('random, tbl_product_id, count, price, cost', 'safe', 'on'=>'search'),
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
			'random' => 'Random',
			'tbl_product_id' => 'Продукт',
			'count' => 'Кол.',
			'price' => 'Цена',
			'cost' => 'Стоимость',
			'tbl_user_id' => 'tbl_user_id',
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
		$session=Yii::app()->session;
		$criteria->compare('random',$this->random);
		$criteria->compare('tbl_product_id',$this->tbl_product_id);
		$criteria->compare('count',$this->count);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('tbl_user_id',Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}
	public function getsum()
	{
	$sum = 0;
	$ors = OrderTemp::model()->findallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
	foreach ($ors as $or){
	$sum = $sum + $or->cost;
	}
	return($sum);
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderTemp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
