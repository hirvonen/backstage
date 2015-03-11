<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

	<title>预约列表</title>

	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet" />
</head>
<body>
<style>
	.tr_color{background-color: #9F88FF}
</style>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：交易管理-》预约一览</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="./index.php?r=appointment/add">【添加预约】</a>
                </span>
            </span>
</div>
<div></div>
<div class="div_search">
            <span>
                <?php $form = $this->beginWidget('CActiveForm'); ?>
                <?php
                if(isset($_POST["aptm_status"])) {
                    $select_status = $_POST["aptm_status"];
                }
                else {
                    $select_status = 0;
                }
                ?>
                订单状态<select name="aptm_status" style="width: 100px;">
                    <option <?php
                    if( $select_status == 0 ) echo " selected="."'"."selected"."' ";
                    ?> value="0">全部</option>
                    <option <?php
                    if( $select_status == 100 ) echo " selected="."'"."selected"."' ";
                    ?> value="100">等待付款</option>
                    <option <?php
                    if( $select_status == 200 ) echo " selected="."'"."selected"."' ";
                    ?> value="200">等待确认</option>
                    <option <?php
                    if( $select_status == 300 ) echo " selected="."'"."selected"."' ";
                    ?> value="300">等待服务</option>
                    <option <?php
                    if( $select_status == 400 ) echo " selected="."'"."selected"."' ";
                    ?> value="400">预约取消</option>
                    <option <?php
                    if( $select_status == 500 ) echo " selected="."'"."selected"."' ";
                    ?> value="500">等待评价</option>
                    <option <?php
                    if( $select_status == 600 ) echo " selected="."'"."selected"."' ";
                    ?> value="600">评价完毕</option>
                </select>
	                <input value="查询" type="submit" />
                <?php $this->endWidget(); ?>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;">
	<table class="table_a" border="1" width="100%">
		<tbody><tr bgcolor="#4169e1" style="font-weight: bold;">
			<td align="center">操作</td>
			<td>预约单号</td>
			<td>预约状态</td>
			<td>理疗师</td>
			<td>预约时间</td>
			<td>服务名称</td>
            <td>顾客姓名</td>
            <td>第几次</td>
		</tr>
		<?php
        $i = 0;
		foreach ($aptm_info as $_v) {
			?>
			<tr <?php
                if($i%2 != 0){
                    echo 'bgcolor="#add8e6"';
                }
                else{
                    echo 'bgcolor="#ffffff"';
                }
                ?> id="user1">
				<td><a href="./index.php?r=appointment/detail&id=<?php echo $_v->pk_aptm_id ?>">详细</a></td>
				<td><?php echo $_v->pk_aptm_id ?></td>
				<td><?php
					switch($_v->aptm_status) {
                        case 100:
    						echo "等待付款";
                            break;
                        case 200:
                            echo "等待确认";
                            break;
                        case 300:
                            echo "等待服务";
                            break;
                        case 400:
                            echo "预约取消";
                            break;
                        case 500:
                            echo "等待评价";
                            break;
                        case 600:
                            echo "评价完毕";
                            break;
                        default:
                            break;
					}
					?></td>
				<td><?php echo $_v->ord_cust_name; ?></td>
				<td><?php
                    $beau_model = Beautician::model();
                    $beau_info = $beau_model->findByPk($_v->aptm_beau_id);
                    if(isset($beau_info)) {
                        echo $beau_info->beau_realname;
                    }
                    else {
                        echo $_v->aptm_beau_id;
                    }
                    ?></td>
				<td><?php echo $_v->aptm_time; ?></td>
                <td><?php
                    $ord_item_model = Order_Item::model();
                    $ord_item_info = $ord_item_model->findByPk($_v->aptm_ord_item_id);
                    if(isset($ord_item_info)) {
                        $comm_model = Commodity::model();
                        $comm_info = $comm_model->findByPk($ord_item_info->ord_item_comm_id);
                        if(isset($comm_info)) {
                            echo $comm_info->comm_name;
                        }
                        else {
                            echo $_v->aptm_ord_item_id;
                        }
                    }
                    else {
                        echo $_v->aptm_ord_item_id;
                    }
                ?></td>
                <td><?php echo $_v->aptm_cust_name; ?></td>
                <td><?php echo $_v->aptm_course_no; ?></td>
			</tr>
		<?php
		    $i++;
        }
		?>
		<tr>
			<td colspan="20" style="text-align: center;">
				[1]
			</td>
		</tr>
		</tbody>
	</table>
</div>
</body>
</html>