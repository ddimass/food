<?php

/**
 * This is the model class for table "tbl_revis_list".
 *
 * The followings are the available columns in table 'tbl_revis_list':
 * @property integer $id
 * @property integer $tbl_ingred_id
 * @property double $count
 * @property string $cost
 * @property double $count_in
 * @property double $margin
 * @property string $desc
 */
class RevisList extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_revis_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_ingred_id', 'numerical', 'integerOnly'=>true),
			array('count, count_in, margin', 'numerical'),
			array('cost', 'length', 'max'=>10),
			array('desc', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tbl_ingred_id, tbl_revis_list, count, cost, count_in, margin, desc', 'safe', 'on'=>'search'),
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
			'tbl_ingred_id' => 'Tbl Ingred',
			'tbl_revis_id' => 'Tbl Revis',
			'count' => 'Count',
			'cost' => 'Cost',
			'count_in' => 'Count In',
			'margin' => 'Margin',
			'desc' => 'Desc',
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
		$criteria->compare('tbl_ingred_id',$this->tbl_ingred_id);
		$criteria->compare('tbl_revis_id',$this->tbl_revis_id);
		$criteria->compare('count',$this->count);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('count_in',$this->count_in);
		$criteria->compare('margin',$this->margin);
		$criteria->compare('desc',$this->desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
			'sort'=>array('defaultOrder'=>'count DESC',),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RevisList the static model class
	 */

	public static function getField($mod)
	{
	return CHtml::activeTextField($mod,'count_in',array(
		'class'=>$mod->id,
		'ajax'=>array(
			'type'=>'POST',
			'url'=>Yii::app()->createUrl('revisList/addcount'),
			'data'=>array('id'=>'js:this.className','count'=>'js:this.value'),
//			'complete'=>'js:$.fn.yiiGridView.update(\'revis-list-grid\')',
			'update'=>'#revis-list-grid',
			)
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
