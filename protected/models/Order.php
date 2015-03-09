<?php

/**
 * 订单模型
 * Class Order
 */
class Order extends CActiveRecord
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
		return '{{order}}';
	}

    public function attributeLabels()
    {
        return array(
            'pk_ord_id'=>'订单编号',
            'ord_cust_id'=>'用户编号',
            'ord_status'=>'订单状态',
            'ord_cust_name'=>'用户姓名',
            'ord_cust_tel'=>'用户电话',
            'ord_cust_addr'=>'用户地址',
            'ord_cust_postcode'=>'用户邮编',
            'ord_pay_way'=>'订单支付方式',
            'ord_upt_time'=>'订单更新时间',
        );
    }
}