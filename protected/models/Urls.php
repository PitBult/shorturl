<?php

/**
 * This is the model class for table "{{urls}}".
 *
 * The followings are the available columns in table '{{urls}}':
 * @property integer $url_id
 * @property string $url_long_url
 * @property string $url_short_code
 * @property string $url_create_date
 * @property string $url_create_ip
 * @property integer $url_counter
 */
class Urls extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Urls the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{urls}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url_long_url, url_short_code', 'required'),
			array('url_counter', 'numerical', 'integerOnly'=>true),
			array('url_long_url', 'length', 'max'=>1000),
			array('url_short_code, url_create_ip', 'length', 'max'=>50),
			array('url_long_url','url'),
			array('url_create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('url_id, url_long_url, url_short_code, url_create_date, url_create_ip, url_counter', 'safe', 'on'=>'search'),
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
			'url_id' => 'ID',
			'url_long_url' => 'Full Url',
			'url_short_code' => 'Short Code',
			'url_create_date' => 'Create Date',
			'url_create_ip' => 'Create Ip',
			'url_counter' => 'Counter',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('url_id',$this->url_id);
		$criteria->compare('url_long_url',$this->url_long_url,true);
		$criteria->compare('url_short_code',$this->url_short_code,true);
		$criteria->compare('url_create_date',$this->url_create_date,true);
		$criteria->compare('url_create_ip',$this->url_create_ip,true);
		$criteria->compare('url_counter',$this->url_counter);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave() 
	{
		if ($this->isNewRecord) {
			$this->url_create_date = date("Y-m-d H:i:s");
			$this->url_create_ip = Yii::app()->request->userHostAddress;
		}

		return parent::beforeSave();
	}
}