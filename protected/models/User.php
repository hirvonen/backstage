<?php

/**
 * 用户模型
 * Class User
 */
class User extends CActiveRecord
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
		return '{{user}}';
	}

	public function attributeLabels()
	{
		return array(
			'pk_usr_id'=>'用户ID',
			'usr_kind'=>'用户种别',
			'usr_reg_kind'=>'用户注册方式',
			'usr_open_id'=>'openid',
			'usr_username'=>'用户名',
			'usr_password'=>'密码',
			'usr_create_time'=>'用户创建时间',
			'usr_last_login'=>'最后登录时间',
			'usr_status'=>'用户状态',
			'usr_pic_id'=>'用户头像',
		);
	}
}