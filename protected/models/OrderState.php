<?php

/**
 * This is the model class for table "tbl_order_state".
 *
 * The followings are the available columns in table 'tbl_order_state':
 * @property integer $id
 * @property integer $tbl_order_id
 * @property integer $tbl_state_id
 * @property integer $user_id
 * @property string $date_time
 */
class OrderState extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_order_state';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_order_id, tbl_state_id, user_id', 'numerical', 'integerOnly'=>true),
			array('date_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tbl_order_id, tbl_state_id, user_id, date_time', 'safe', 'on'=>'search'),
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
			'tbl_order_id' => 'Tbl Order',
			'tbl_state_id' => 'Tbl State',
			'user_id' => 'User',
			'date_time' => 'Date Time',
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
		$criteria->compare('tbl_order_id',$this->tbl_order_id);
		$criteria->compare('tbl_state_id',$this->tbl_state_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_time',$this->date_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderState the static model class
	 */
	 public static function add($oid,$sid)
	{
	$ordstate = OrderState::model()->findbyattributes(array('tbl_order_id'=>$oid,'tbl_state_id'=>$sid));
	if (count($ordstate)) {
	$ordstate->date_time = new CDbExpression('NOW()');
	$ordstate->save(false);
	} else {
	$ordstate = new OrderState;
	$ordstate->user_id = Yii::app()->user->id;
	$ordstate->tbl_order_id = $oid;
	$ordstate->tbl_state_id = $sid;
	$ordstate->date_time = new CDbExpression('NOW()');
	$ordstate->save(false); 
	}
		return 1;
	}
	public static function getlast($oid)
	{
//	$ords = array();
	$ords = OrderState::model()->findbyattributes(array('tbl_order_id'=>$oid),array('order'=>'date_time DESC'));
#	$ords = OrderState::model()->findbyattributes(array('tbl_order_id'=>$oid));

//	$ords = new array();
//	if (count($ordstates)) {
 //	$ords = $ordstates['0'];
//	foreach ($ordstates as $ordstate) {
//	if ($ord->date_time < $ordstate->date_time) {
//	$ords = $ordstate;
//	}
//	}
//	}
	return $ords;
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
