<?php

/**
 * This is the model class for table "tbl_product".
 *
 * The followings are the available columns in table 'tbl_product':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $tbl_kitchen_id
 * @property string $image
 * @property integer $sort
 *
 * The followings are the available model relations:
 * @property TblOrderList[] $tblOrderLists
 * @property TblKitchen $tblKitchen
 * @property TblProductCat[] $tblProductCats
 * @property TblProductIngred[] $tblProductIngreds
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, tbl_kitchen_id, price', 'required'),
			array('tbl_kitchen_id, sort', 'numerical', 'integerOnly'=>true),
			array('own_price, price', 'numerical', 'integerOnly'=>false),
			array('name', 'length', 'max'=>100),
			array('description, image', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, tbl_kitchen_id, image, sort', 'safe', 'on'=>'search'),
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
			'tblOrderLists' => array(self::HAS_MANY, 'TblOrderList', 'tbl_product_id'),
			'tblKitchen' => array(self::BELONGS_TO, 'TblKitchen', 'tbl_kitchen_id'),
			'tblProductCats' => array(self::HAS_MANY, 'TblProductCat', 'tbl_product_id'),
			'tblProductIngreds' => array(self::HAS_MANY, 'TblProductIngred', 'tbl_product_id'),
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
			'description' => 'Описание',
			'tbl_kitchen_id' => 'Кухня',
			'image' => 'Картинка',
			'own_price' => 'Себестоимость (руб)',
			'sort' => 'Порядок сортировки',
			'enabled' => 'Нужен',
			'price' => 'Стоимость',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tbl_kitchen_id',$this->tbl_kitchen_id);
		$criteria->compare('own_price',$this->own_price);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('price',$this->price);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function ingcalc($pid)
	{
	$ings = array();
//	$prod = Product::model()->findbypk($pid);
	$prepacks = ProductPrepack::model()->findallbyattributes(array('tbl_product_id'=>$pid));
	foreach ($prepacks as $prepack) {
	$arr = array();
	$ings = Prepack::prepackneed($prepack->tbl_prepack_id,$prepack->count);
	}
	return $ings;
	}
	public static function ingcal($pid,$count)
	{
	$ings = array();
	$prepacks = ProductPrepack::model()->findallbyattributes(array('tbl_product_id'=>$pid));
	foreach ($prepacks as $prepack) {
	$cou = $prepack->count * $count;
	$arr = array();
	$arr = Prepack::preneed($arr,$prepack->tbl_prepack_id,$cou);
	$ings = $ings + $arr;
	}
	return $ings;
	}
	public static function sale($id) 
	{
	$prodcat = ProductCat::model()->findbyattributes(array('tbl_product_id'=>$id,'tbl_cat_id'=>28));
	//$prod = Product::model()->findbypk($id);
	if (isset($prodcat)) {
	return 0;
	} else { return 1;
	}
	}
	public static function calc($id) 
	{
	$prepacks = ProductPrepack::model()->findallbyattributes(array('tbl_product_id'=>$id));
	$price = 0;
	foreach ($prepacks as $prepack) {
	$price = $price + $prepack->count * Prepack::model()->findbypk($prepack->tbl_prepack_id)->cost;
	}
	$product=Product::model()->findbypk($id);
	$product->own_price = $price;
	$product->save();
	return $price;
	}
}
