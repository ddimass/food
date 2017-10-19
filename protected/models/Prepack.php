<?php

/**
 * This is the model class for table "tbl_prepack".
 *
 * The followings are the available columns in table 'tbl_prepack':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $sort
 * @property double $cost
 *
 * The followings are the available model relations:
 * @property TblIngred[] $tblIngreds
 * @property TblProduct[] $tblProducts
 */
class Prepack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_prepack';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('cost, out', 'numerical'),
			array('image', 'length', 'max'=>45),
			array('name, description', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, image, sort, cost', 'safe', 'on'=>'search'),
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
			'tblIngreds' => array(self::MANY_MANY, 'TblIngred', 'tbl_prepack_ingred(tbl_prepack_id, tbl_ingred_id)'),
			'tblProducts' => array(self::MANY_MANY, 'TblProduct', 'tbl_product_prepack(tbl_prepack_id, tbl_product_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Полуфабрикат',
			'description' => 'Описание',
			'image' => 'Картинка',
			'sort' => 'Сортировка',
			'cost' => 'Себестоимость на ед.',
			'out' => 'Выход',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('out',$this->out);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prepack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function ingredneed($prid,$count)
	{
	$preings = PrepackIngred::model()->findallbyattributes(array('tbl_prepack_id'=>$prid));
	$ingw = array();
	foreach ($preings as $preing) {
	$prep12 = Prepack::model()->findbypk($prid);
	$ar = array();
	if ($prep12->out !=0) {
	$co = $count * $preing->count /  $prep12->out;
	$co = round($co,5);
	} else {
	$co = 0;
	}
	$ingh = Ingred::model()->findbypk($preing->tbl_ingred_id);
	if ($ingh->amount != 0) {
	$ownpr = $co * $ingh->cost / $ingh->amount;
	$ownpr = round($ownpr,2);
	} else {$ownpr = 0;}
	$ar = array("iid"=>$preing->tbl_ingred_id,"count"=>$co,"own_price"=>$ownpr);
	array_push($ingw,$ar);
	}
	return $ingw;
	}
	public static function preneed($preps,$prid, $count)
	{
//	$preps = array();
	$ar = Prepack::ingredneed($prid,$count);
	$ars = array("prid"=>$prid,"ings"=>$ar,"count"=>$count);
	array_push($preps,$ars);
	$pre = Prepack::model()->findbypk($prid);
	$prepacks = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$prid));
	foreach ($prepacks as $prepack) {
	if ($pre->out) {
	$cou = $count * $prepack->count / $pre->out;
	} else {$cou = 0;}
	$preps = Prepack::preneed($preps,$prepack->prepack_id,$cou);
	// array_push($preps,$arr);
	}
	return $preps;
	}

	public static function prepackneed($prid,$count)
	{
	$preps = array();
	$ar = Prepack::ingredneed($prid,$count);
	$session = Yii::app()->session;
	$session['post'] = $ar;
	$prepres = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$prid));
	foreach ($prepres as $prepre) {
	$pr = Prepack::model()->findbypk($prid);
	if ($pr->out != 0) {
	$pri = $count * $prepre->count / $pr->out; // / $prepre->count;
	} else {
	$pri = $count;
	}
	$ars = array("prid"=>$prid,"ings"=>$ar,"count"=>$count);
	array_push($preps,$ars);
	$prepres1 = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$prepre->prepack_id));
	foreach ($prepres1 as $prepre1) {
	$pr = Prepack::model()->findbypk($prepre->prepack_id);
	if ($pr->out != 0) {
	$pri = $prepre->count * $prepre1->count / $pr->out;
	} else { $pri = 0; }
	$ar = Prepack::ingredneed($prepre1->prepack_id,$pri);
	$ars = array("prid"=>$prepre1->prepack_id,"ings"=>$ar,"count"=>$pri);
	array_push($preps,$ars);
	$prepres2 = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$prepre1->prepack_id));
	foreach ($prepres2 as $prepre2) {
	$pr = Prepack::model()->findbypk($prepre1->prepack_id);
	if ($pr->out != 0) {
	$pri = $prepre2->count * $prepre1->count / $pr->out; // / $prepre2->count;
	} else { $pri = 0; }
	$ar = Prepack::ingredneed($prepre2->prepack_id,$pri);
	$ars = array("prid"=>$prepre2->prepack_id,"ings"=>$ar,"count"=>$pri);
	array_push($preps,$ars);
	$prepres3 = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$prepre2->prepack_id));
	foreach ($prepres3 as $prepre3) {
	$pr = Prepack::model()->findbypk($prepre2->prepack_id);
	if ($pr->out != 0) {
	$pri = $prepre3->count * $prepre2->count / $pr->out; // / ;
	} else { $pri = 0; }
	$ar = Prepack::ingredneed($prepre3->prepack_id,$pri);
	$ars = array("prid"=>$prepre3->prepack_id,"ings"=>$ar,"count"=>$pri);
	array_push($preps,$ars);
	$prepres4 = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$prepre3->prepack_id));
	foreach ($prepres4 as $prepre4) {
	$pr = Prepack::model()->findbypk($prepre3->prepack_id);
	if ($pr->out != 0) {
	$pri = $prepre4->count * $prepre3->count / $pr->out ; // / ;
	} else { $pri = 0; }
	$ar = Prepack::ingredneed($prepre4->prepack_id,$pri);
	$ars = array("prid"=>$prepre4->prepack_id,"ings"=>$ar,"count"=>$pri);
	array_push($preps,$ars);
	}
	}
	}
	}
	}
	return $preps;
	}

	public static function calc($id)
	{
	$price = 0;
	$ingreds = PrepackIngred::model()->findallbyattributes(array('tbl_prepack_id'=>$id));
	foreach ($ingreds as $ingred) {
	$price = $price + Ingred::calc($ingred->tbl_ingred_id,$ingred->count);
	}
	$prepacks = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$id));
	foreach ($prepacks as $prepack) {
	$price = $price + $prepack->count * Prepack::model()->findbypk($prepack->prepack_id)->cost;
	}
	// $price = $price / Prepack::model()->findbypk($id)->out;
	$pre = Prepack::model()->findbypk($id);
	$out = Prepack::model()->findbypk($id)->out;
	if ($out!=0){$price = $price / $out;}
	$pre->cost = $price;
	$pre->save(false);
	return $price;
	}
}
