<?php

/**
 * This is the model class for table "tbl_order".
 *
 * The followings are the available columns in table 'tbl_order':
 * @property integer $id
 * @property string $date_time
 * @property integer $tbl_user_id
 * @property integer $tbl_client_id
 * @property string $tbl_state_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property TblClaim[] $tblClaims
 * @property TblUser $tblUser
 * @property TblClients $tblClient
 * @property TblOrderList[] $tblOrderLists
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_time, tbl_user_id, tbl_client_id, tbl_state_id', 'required'),
			array('tbl_user_id, tbl_client_id, tbl_courier_id, tbl_state_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_time, tbl_user_id, tbl_client_id, description', 'safe', 'on'=>'search'),
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
			'tblClaims' => array(self::HAS_MANY, 'TblClaim', 'tbl_order_id'),
			'tblUser' => array(self::BELONGS_TO, 'TblUser', 'tbl_user_id'),
			'tblClient' => array(self::BELONGS_TO, 'Clients', 'tbl_client_id','with'=>'tblPhones'),
//			'phon' => array(self::BELONGS_TO, 'Phones', array('tbl_client_id'=>'id'), 'through'=>'tblClient'),
//			'Phones' = > array(self::BELONGS_TO, 'Phones', 'tbl_client_id'),
			'tblCourier' => array(self::BELONGS_TO, 'TblCourier', 'tbl_courier_id'),
			'tblState' => array(self::BELONGS_TO, 'TblState', 'tbl_state_id'),
			'tblOrderLists' => array(self::HAS_MANY, 'TblOrderList', 'tbl_order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_time' => 'Date Time',
			'tbl_user_id' => 'Оператор',
			'tbl_client_id' => 'Клиент',
			'tbl_courier_id' => 'Курьер',
			'cost' => 'Стоимость',
			'cash' => 'Наличные',
			'tbl_discount_type_id' => 'Скидка',
			'tbl_state_id' => 'Состояние заказа',
			'description' => 'Коментарии к заказу :',
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
		$time1 = new DateTime("00:00:00");
		$time2 = new DateTime("05:00:00");
		$timenow = new DateTime("now");
		if (($timenow > $time1) and ($timenow < $time2)) {
		$date = date("Y-m-d" . " 05:00:00",strtotime("-1 days"));
		$dates = date("Y-m-d"." 05:00:00");
//		$this->date_time = date("Y-m-d" . " 05:00:00",strtotime("-1 days"));
		} else
		{
//		$this->date_time = date("Y-m-d" . " 05:00:00");
		$date = date("Y-m-d" . " 05:00:00");
		$dates = date("Y-m-d"." 05:00:00", strtotime("+1 days"));
		}
		if (Yii::app()->user->role == '2') {$criteria->addBetweencondition('date_time',$date,$dates, 'AND');}
		if (Yii::app()->user->role == '1') {$criteria->addBetweencondition('date_time','2014-06-09 05:00:00','2014-06-10 05:00:00', 'AND');}
		$criteria->compare('date_time',$this->date_time,true);
		$criteria->compare('tbl_user_id',$this->tbl_user_id);
		$criteria->with = array('tblClient'=>array('with'=>array('tblPhones')));
		if (strlen($this->tbl_client_id)) {$criteria->addSearchCondition('tblPhones.phone',$this->tbl_client_id, true);}
	//	$criteria->compare('tbl_client_id',$this->tbl_client_id, true);
		$criteria->compare('tbl_courier_id',$this->tbl_courier_id);
		$criteria->compare('tbl_state_id',$this->tbl_state_id);
		$criteria->compare('tbl_discount_type_id',$this->tbl_discount_type_id);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
			'sort'=>array('defaultOrder'=>'date_time DESC', ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	 
	public static function sales() {
	$dtid = -1;
	$sal = 0;
	$session = Yii::app()->session;
	$clid = $session['clid'];
	$coid = $session['coid'];
	if ($clid!='-1'){
	$ordc = Clients::ordc($clid);
	$sales = DiscountType::model()->findbypk($clid)->value;
	$dtid = $clid;
	if ($sal > $sales) {$sales = $sal;}} else {$sales = 0;}
	if ($dtid != -1) {
	return $dtid; } else {return $dtid = 1;}
	}
	public static function disc() {
	
	}
	
	public static function calc() {
	$sum = 0;
	$sal = Order::sales();
	if ($sal!=-1) {
	$sales = DiscountType::model()->findbypk($sal)->value; } else {$sales = 0;}
//	$ordertems->tbl_discount_type_id = Client::model()->findbypk($clid)->tbl_discount_type_id;
	$ordtems = OrderTemp::model()->findallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));

	foreach ($ordtems as $ordtem) {
//	$ordcat = ProductCat::model()->findbyattributes(array('tbl_product_id'=>$ordtem->tbl_product_id,'tbl_cat_id'=>28));
	if (Product::sale($ordtem->tbl_product_id)==1) {
	$sum = $sum + ($ordtem->cost - ($ordtem->cost * $sales / 100));}
	else {$sum = $sum + $ordtem->cost;}
	// $session['post'] = $session['post'] . ' | ' . $sum;
	}
//	$sum = number_format($sum,2);
	return $sum;
	}
	
	public static function rowcolor($id)
	{
	if ($id == 1)  {return 'blink';}
	if ($id == 2)  {return 'green';}
	if ($id == 3)  {return 'blue';}
	if ($id == 4)  {return 'red';}
	if ($id == 5)  {return 'red';}
	}
	public static function getStatus($oid,$id)
	{
	$states = State::model()->findall();
	$list = CHtml::listdata($states,'id','name');
	return CHtml::dropDownlist('states', $id, $list, array(
	'class'=>$oid,
	'ajax'=>array(
	'type'=>'POST',
	'url'=>Yii::app()->createUrl('Order/setState'),
	'data'=>array('oid'=>'js:this.className','sid'=>'js:this.value'),
	),
	));
	}
	public static function getCourier($oid,$id)
	{
	$states = Courier::model()->findallbyattributes(array(),'fired <> 1');
	$list = CHtml::listdata($states,'id','name');
	return CHtml::dropDownlist('courier', $id, $list, array(
	'class'=>'status',
	'id'=>$oid,
	'ajax'=>array(
	'type'=>'POST',
	'url'=>Yii::app()->createUrl('order/setCourier'),
	'data'=>array('oid'=>'js:this.id','cid'=>'js:this.value'),
	),
	));
	}
	

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
