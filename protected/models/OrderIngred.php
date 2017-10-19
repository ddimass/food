<?php

/**
 * This is the model class for table "tbl_order_ingred".
 *
 * The followings are the available columns in table 'tbl_order_ingred':
 * @property integer $id
 * @property integer $tbl_order_id
 * @property integer $tbl_product_id
 * @property integer $tbl_ingred_id
 * @property integer $count
 * @property integer $held
 */
class OrderIngred extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_order_ingred';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_order_id, tbl_product_id, tbl_ingred_id, count, held', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tbl_order_id, tbl_product_id, tbl_ingred_id, count, held', 'safe', 'on'=>'search'),
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
			'tbl_order_id' => 'Номер заказа',
			'tbl_product_id' => 'Продукт',
			'tbl_ingred_id' => 'Ингредиент',
			'count' => 'Количество в Гр.',
			'held' => 'Учтено',
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
		$criteria->compare('tbl_product_id',$this->tbl_product_id);
		$criteria->compare('tbl_ingred_id',$this->tbl_ingred_id);
		$criteria->compare('count',$this->count);
		$criteria->compare('held',$this->held);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderIngred the static model class
	 */
	public static function sav($arr,$oid,$pid)
	{
	
	foreach ($arr as $prepack) {
		foreach($prepack['ings'] as $ingred) {
			$ording = new OrderIngred;
			$ording->tbl_order_id = $oid;
			$ording->tbl_product_id = $pid;
			$ording->tbl_ingred_id = $ingred['iid'];
			$ording->count = $ingred['count'];
			$ording->dt = new CDbExpression('NOW()');
			$ording->save(false);
//			$session = Yii::app()->session;
//			$session['post'] = $ording;
			
			}
	}
		
		return 1;
	}
	public static function calc($iid)
	{
//		$sql = 'select sum(count) from tbl_order_ingred where tbl_ingred_id='.$iid;
		$count = Yii::app()->db->createCommand()
		->select('sum(count)')
		->from('tbl_order_ingred')
		->where('tbl_ingred_id=:iid',array(':iid'=>$iid))
		->queryall();
		return $count[0]['sum(count)'];
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
