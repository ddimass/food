<?php

/**
 * This is the model class for table "tbl_ingred_invoice".
 *
 * The followings are the available columns in table 'tbl_ingred_invoice':
 * @property integer $tbl_ingred_id
 * @property integer $tbl_invoice_id
 * @property integer $id
 * @property double $count
 * @property string $cost
 *
 * The followings are the available model relations:
 * @property TblIngred $tblIngred
 * @property TblInvoice $tblInvoice
 */
class IngredInvoice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ingred_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_ingred_id, tbl_invoice_id, count, cost', 'required'),
			array('tbl_ingred_id, tbl_invoice_id', 'numerical', 'integerOnly'=>true),
			array('count', 'numerical'),
			array('cost', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tbl_ingred_id, tbl_invoice_id, id, count, cost', 'safe', 'on'=>'search'),
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
			'tblIngred' => array(self::BELONGS_TO, 'TblIngred', 'tbl_ingred_id'),
			'tblInvoice' => array(self::BELONGS_TO, 'TblInvoice', 'tbl_invoice_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tbl_ingred_id' => 'Ингредиент',
			'tbl_invoice_id' => 'Накладная',
			'id' => 'ID',
			'count' => 'Количество',
			'cost' => 'Стоимость всего',
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

		$criteria->compare('tbl_ingred_id',$this->tbl_ingred_id);
		$criteria->compare('tbl_invoice_id',$this->tbl_invoice_id);
		$criteria->compare('id',$this->id);
		$criteria->compare('count',$this->count);
		$criteria->compare('cost',$this->cost,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IngredInvoice the static model class
	 */

	public static function calc_count($iid)
	{
	$count = Yii::app()->db->createCommand()
		->select('sum(count)')
		->from('tbl_ingred_invoice')
		->where('tbl_ingred_id=:iid',array(':iid'=>$iid))
		->queryall();
		return $count[0]['sum(count)'];
	}
	public static function calc_cost($iid)
	{
		$cost = Yii::app()->db->createCommand()
		->select('sum(cost)')
		->from('tbl_ingred_invoice')
		->where('tbl_ingred_id=:iid',array(':iid'=>$iid))
		->queryall();
		return $cost[0]['sum(cost)'];
	}
	

	
	public static function calc_cost_count($iid)
	{
	$coco = array();
	$coco['count'] = IngredInvoice::calc_count($iid);
	$cost = IngredInvoice::calc_cost($iid);
	if ($coco['count']) {
	$coco['cost'] = $cost / $coco['count'];
	} else {$coco['cost'] = 0;}
		return $coco;
	}
	


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
