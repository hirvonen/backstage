<?php

/**
 * 顾客信息模型
 * Class Customer
 */
class Customer extends CActiveRecord
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
		return '{{customer}}';
	}

	public function attributeLabels()
	{
		return array(
			'cust_level'=>'客户级别',
			'cust_balance'=>'账户余额',
			'cust_point'=>'剩余积分',
			'cust_realname'=>'真实姓名',
			'cust_mobile1'=>'手机号码1',
			'cust_mobile2'=>'手机号码2',
			'cust_phone'=>'固定电话',
			'cust_sex'=>'性别',
			'cust_birthday'=>'生日',
			'cust_email1'=>'电子邮件1',
			'cust_email2'=>'电子邮件2',
			'cust_child_no'=>'第几胎',
			'cust_childbearing_age'=>'最近一次生育年龄',
		);
	}
}