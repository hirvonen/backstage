<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>订单详细信息</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：交易管理-》订单详细信息</span>
	            <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=order/show">【返回】</a>
                </span>
	            <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=order/update&id=<?php echo $order_info->pk_ord_id; ?>">【修改订单信息】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
	<?php $form = $this->beginWidget('CActiveForm'); ?>
	<table border="1" width="100%" class="table_a">
		<tr bgcolor="#add8e6">
			<td>
				<?php echo $form->label($order_info, 'pk_ord_id'); ?>
			</td>
			<td>
				<?php echo $order_info->pk_ord_id; ?>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>
				<?php echo $form->label($order_info, 'ord_cust_id'); ?>
			</td>
			<td>
				<?php echo $order_info->ord_cust_id; ?>
			</td>
		</tr>
		<tr bgcolor="#add8e6">
			<td>
				<?php echo $form->label($order_info, 'ord_status'); ?>
			</td>
			<td>
				<?php
                switch($order_info->ord_status) {
                    case 100:
                        echo "等待确认";
                        break;
                    case 200:
                        echo "等待付款";
                        break;
                    case 300:
                        echo "等待服务";
                        break;
                    case 400:
                        echo "订单取消";
                        break;
                    case 500:
                        echo "等待评价";
                        break;
                    case 600:
                        echo "订单完成";
                        break;
                    default:
                        break;
                }
				?>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>
				<?php echo $form->label($order_info, 'ord_cust_name'); ?>
			</td>
			<td>
				<?php echo $order_info->ord_cust_name; ?>
			</td>
		</tr>
		<tr bgcolor="#add8e6">
			<td>
				<?php echo $form->label($order_info, 'ord_cust_tel'); ?>
			</td>
			<td>
                <?php echo $order_info->ord_cust_tel; ?>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>
				<?php echo $form->label($order_info, 'ord_cust_addr'); ?>
			</td>
			<td>
                <?php echo $order_info->ord_cust_addr; ?>
			</td>
		</tr>
		<tr bgcolor="#add8e6">
            <td>
                <?php echo $form->label($order_info, 'ord_cust_postcode'); ?>
            </td>
            <td>
                <?php echo $order_info->ord_cust_postcode; ?>
            </td>
		</tr>
		<tr bgcolor="#ffffff">
            <td>
                <?php echo $form->label($order_info, 'ord_pay_way'); ?>
            </td>
            <td>
	            <?php
	            switch($order_info->ord_pay_way) {
		            case 1:
			            echo "支付宝支付";
			            break;
		            case 2:
			            echo "微信支付";
			            break;
		            case 3:
			            echo "余额支付";
			            break;
		            case 4:
			            echo "上门到付";
			            break;
		            case 5:
			            echo "团购支付";
			            break;
		            default:
			            break;
	            }
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
	</table>
	<?php $this->endWidget(); ?>
</div>

</body>
</html>