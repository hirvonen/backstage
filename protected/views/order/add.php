<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>订单添加</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：用户管理-》添加订单</span>
	            <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=order/show">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
	<?php $form = $this->beginWidget('CActiveForm'); ?>
	<table border="1" width="100%" class="table_a">
        <tr bgcolor="#ffffff">
            <td>
                <?php echo $form->labelEx($order_info, 'ord_cust_id'); ?>
            </td>
            <td>
                <?php echo $form->textField($order_info, 'ord_cust_id'); ?>
            </td>
        </tr>
        <tr bgcolor="#add8e6">
            <td>
                <?php echo $form->label($order_info, 'ord_status'); ?>
            </td>
            <td>
                <?php
                $options = array ('100'=>'等待确认',
                    '200'=>'等待付款',
                    '300'=>'等待服务',
                    '400'=>'订单取消',
                    '500'=>'等待评价',
                    '600'=>'订单完成',);
                echo $form->dropDownList($order_info,'ord_status',$options);
                ?>
            </td>
        </tr>
        <tr bgcolor="#ffffff">
            <td>
                <?php echo $form->label($order_info, 'ord_cust_name'); ?>
            </td>
            <td>
                <?php echo $form->textField($order_info, 'ord_cust_name'); ?>
            </td>
        </tr>
        <tr bgcolor="#add8e6">
            <td>
                <?php echo $form->label($order_info, 'ord_cust_tel'); ?>
            </td>
            <td>
                <?php echo $form->textField($order_info, 'ord_cust_tel'); ?>
                <?php echo $form->error($order_info, 'ord_cust_tel'); ?>
            </td>
        </tr>
        <tr bgcolor="#ffffff">
            <td>
                <?php echo $form->label($order_info, 'ord_cust_addr'); ?>
            </td>
            <td>
                <?php echo $form->textArea($order_info, 'ord_cust_addr',array('cols'=>100,'rows'=>5)); ?>
            </td>
        </tr>
        <tr bgcolor="#add8e6">
            <td>
                <?php echo $form->label($order_info, 'ord_cust_postcode'); ?>
            </td>
            <td>
                <?php echo $form->textField($order_info, 'ord_cust_postcode'); ?>
                <?php echo $form->error($order_info, 'ord_cust_postcode'); ?>
            </td>
        </tr>
        <tr bgcolor="#ffffff">
            <td>
                <?php echo $form->label($order_info, 'ord_pay_way'); ?>
            </td>
            <td>
                <?php
                $pay_way_options = array (
                    '1'=>'支付宝支付',
                    '2'=>'微信支付',
                    '3'=>'余额支付',
                    '4'=>'上门到付',
                    '5'=>'团购支付',);
                echo $form->dropDownList($order_info,'ord_pay_way',$pay_way_options);
                ?>
            </td>
        </tr>
        <tr bgcolor="#add8e6">
            <td>
                <?php echo $form->label($order_info, 'ord_upt_time'); ?>
            </td>
            <td>
                <?php echo $order_info->ord_upt_time; ?>
            </td>
        </tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="添加">
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>

</body>
</html>