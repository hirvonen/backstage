<?php

/**
 * 美疗师模型
 * Class Beautician
 */
class Beautician extends CActiveRecord
{
	/**
	 * 创建模型对象
	 * @param string $className
	 * @return static
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * 返回数据表名字
	 * @return string
	 */
	public function tableName()
	{
		return '{{beautician}}';
	}

	public function attributeLabels()
	{
		return array(
			'beau_realname'=>'真实姓名',
			'beau_nickname'=>'昵称',
			'beau_idcard_id'=>'身份证号码',
			'beau_level'=>'理疗师级别',
			'beau_tel1'=>'联系电话1',
			'beau_tel2'=>'联系电话2',
			'beau_tel3'=>'联系电话3',
			'beau_sex'=>'性别',
			'beau_birthday'=>'生日',
			'beau_email'=>'电子邮件',
			'beau_intro'=>'简介',
		);
	}
}