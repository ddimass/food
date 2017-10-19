<?php

/**
 * This is the model class for table "tbl_prepack_ingred".
 *
 * The followings are the available columns in table 'tbl_prepack_ingred':
 * @property integer $tbl_prepack_id
 * @property integer $tbl_ingred_id
 * @property double $out
 * @property double $count
 * @property string $description
 * @property integer $sort
 * @property string $image
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property TblPrepack $tblPrepack
 * @property TblIngred $tblIngred
 */
class PrepackIngred extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_prepack_ingred';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tbl_prepack_id, tbl_ingred_id, out', 'required'),
			array('tbl_prepack_id, tbl_ingred_id, sort', 'numerical', 'integerOnly'=>true),
			array('out, count', 'numerical'),
			array('description', 'length', 'max'=>100),
			array('image', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tbl_prepack_id, tbl_ingred_id, out, count, description, sort, image, id', 'safe', 'on'=>'search'),
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
			'tblPrepack' => array(self::BELONGS_TO, 'TblPrepack', 'tbl_prepack_id'),
			'tblIngred' => array(self::BELONGS_TO, 'TblIngred', 'tbl_ingred_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tbl_prepack_id' => 'Tbl Prepack',
			'tbl_ingred_id' => 'Ингредиент',
			'out' => 'Выход ингредиента',
			'count' => 'Количество',
			'description' => 'Description',
			'sort' => 'Sort',
			'image' => 'Image',
			'id' => 'ID',
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

		$criteria->compare('tbl_prepack_id',$this->tbl_prepack_id);
		$criteria->compare('tbl_ingred_id',$this->tbl_ingred_id);
		$criteria->compare('out',$this->out);
		$criteria->compare('count',$this->count);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrepackIngred the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
