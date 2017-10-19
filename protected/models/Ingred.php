<?php

/**
 * This is the model class for table "tbl_ingred".
 *
 * The followings are the available columns in table 'tbl_ingred':
 * @property integer $id
 * @property string $name
 * @property integer $amount
 * @property string $description
 * @property string $image
 * @property string $cost
 * @property integer $tbl_count_in_id
 *
 * The followings are the available model relations:
 * @property TblCountIn $tblCountIn
 * @property TblIngredInvoice[] $tblIngredInvoices
 * @property TblPrepackIngred[] $tblPrepackIngreds
 * @property TblProductIngred[] $tblProductIngreds
 */
class Ingred extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ingred';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, tbl_count_in_id', 'required'),
			array('tbl_count_in_id', 'numerical', 'integerOnly'=>true),
			array('name, description', 'length', 'max'=>100),
			array('image', 'length', 'max'=>45),
			array('cost, amount', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, amount, description, image, cost, tbl_count_in_id', 'safe', 'on'=>'search'),
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
			'tblCountIn' => array(self::BELONGS_TO, 'TblCountIn', 'tbl_count_in_id'),
			'tblIngredInvoices' => array(self::HAS_MANY, 'TblIngredInvoice', 'tbl_ingred_id'),
			'tblPrepackIngreds' => array(self::HAS_MANY, 'TblPrepackIngred', 'tbl_ingred_id'),
			'tblProductIngreds' => array(self::HAS_MANY, 'TblProductIngred', 'tbl_ingred_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'amount' => 'Остаток',
			'description' => 'Описание',
			'image' => 'Картинка',
			'cost' => 'Цена остатка',
			'tbl_count_in_id' => 'Упаковка',
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
		// @todo Please modify the following code to remove attributes that should not be searched.
{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('tbl_count_in_id',$this->tbl_count_in_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ingred the static model class
	 */
	public static function amount($id)
	{
	$ingreds = OrderIngred::model()->findallbyattributes(array('tbl_ingred_id'=>$id));
	$amount = 0;
	foreach ($ingreds as $ingred) {
	$amount = $amount + $ingred->count;
	}
		return $amount;
	}

	
	public static function calc1($id,$count) {
	$ingred = Ingred::model()->findbypk($id);
	if ($ingred->amount == 0) {
	return $ingred->cost * $count;
	}
	else
	{
	return $ingred->cost / $ingred->amount * $count;
	}
	}
	public static function amountd($id,$dates,$daten)
	{
	$ingreds = OrderIngred::model()->findallbyattributes(array('tbl_ingred_id'=>$id));
	$amount = 0;
	foreach ($ingreds as $ingred) {
	$ord = Order::model()->findbypk($ingred->tbl_order_id);
	if ($dates<$ord->date_time && $ord->date_time<$daten) {
	$amount = $amount + $ingred->count;
	}
	}
		return $amount;
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function calc($id,$count) {
	$ingred = Ingred::model()->findbypk($id);
	if ($ingred->amount == 0) {
	return $ingred->cost * $count;
	}
	else
	{
	return $ingred->cost / $ingred->amount * $count;
	}
	}
}
