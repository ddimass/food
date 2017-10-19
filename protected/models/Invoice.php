<?php

/**
 * This is the model class for table "tbl_invoice".
 *
 * The followings are the available columns in table 'tbl_invoice':
 * @property integer $id
 * @property string $date
 * @property string $number
 * @property integer $tbl_provider_id
 *
 * The followings are the available model relations:
 * @property TblIngredInvoice[] $tblIngredInvoices
 * @property TblProvider $tblProvider
 */
class Invoice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, tbl_provider_id', 'required'),
			array('tbl_provider_id', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, number, tbl_provider_id', 'safe', 'on'=>'search'),
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
			'tblIngredInvoices' => array(self::HAS_MANY, 'TblIngredInvoice', 'tbl_invoice_id'),
			'tblProvider' => array(self::BELONGS_TO, 'TblProvider', 'tbl_provider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Дата',
			'number' => 'Номер',
			'tbl_provider_id' => 'Поставщик',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('tbl_provider_id',$this->tbl_provider_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize' => 50,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Invoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function calccost($id)
	{
	$inginvs = IngredInvoice::model()->findallbyattributes(array('tbl_invoice_id'=>$id));
	$sum = 0;
	foreach ($inginvs as $inginv) {
	$sum = $sum + $inginv->cost;
	}
	return $sum;
	}
}
