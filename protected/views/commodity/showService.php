<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

	<title>服务列表</title>

	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet" />
</head>
<body>
<style>
	.tr_color{background-color: #9F88FF}
</style>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》服务一览</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="./index.php?r=commodity/addService">【添加服务】</a>
                </span>
            </span>
</div>
<div></div>
<div class="div_search">
            <span>
                <?php $form = $this->beginWidget('CActiveForm'); ?>
	            <?php
	                if(isset($_POST["comm_is_show"])) {
		                $select_show = $_POST["comm_is_show"];
	                }
	                else {
		                $select_show = 2;
	                }
	                if(isset($_POST["comm_is_hot"])){
		                $select_hot = $_POST["comm_is_hot"];
	                }
	                else{
		                $select_hot = 2;
	                }

	            ?>
	            显示<select name="comm_is_show" style="width: 100px;">
		                <option <?php
		                            if( $select_show == 2 ) echo " selected="."'"."selected"."' ";
		                        ?> value="2">全部</option>
		                <option <?php
				                    if( $select_show == 1 ) echo " selected="."'"."selected"."' ";
				                ?> value="1">显示</option>
		                <option <?php
				                    if( $select_show == 0 ) echo " selected="."'"."selected"."' ";
				                ?> value="0">未显示</option>
	                </select>
                热门<select name="comm_is_hot" style="width: 100px;">
		                <option <?php
					                if( $select_hot == 2 ) echo " selected="."'"."selected"."' ";
		                        ?> value="2">全部</option>
		                <option <?php
		                            if( $select_hot == 1 ) echo " selected="."'"."selected"."' ";
		                        ?> value="1">热门</option>
		                <option <?php
				                    if( $select_hot == 0 ) echo " selected="."'"."selected"."' ";
				                ?> value="0">非热门</option>
	                </select>
	                <input value="查询" type="submit" />
	            <?php $this->endWidget(); ?>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;">
	<table class="table_a" border="1" width="100%">
		<tbody><tr style="font-weight: bold;">
			<td align="center">操作</td>
			<td>服务编号</td>
			<td>种别</td>
			<td>服务名称</td>
			<td>价格</td>
			<td>折扣价格</td>
			<td>上架时间</td>
			<td>下架时间</td>
			<td>变更时间</td>
			<td>点击次数</td>
			<td>介绍1</td>
			<td>介绍2</td>
			<td>介绍3</td>
			<td>介绍4</td>
			<td>介绍5</td>
			<td>热门</td>
			<td>是否显示</td>
			<td>排序</td>
		</tr>
		<?php
		foreach ($commodity_info as $_v) {
		?>
			<tr id="product1">
				<td><a href="./index.php?r=commodity/updateService&id=<?php echo $_v->pk_comm_id ?>">修改</a></td>
				<td><?php echo $_v->pk_comm_id ?></td>
				<td><?php
					if($_v->comm_kind == 1) {
						echo "服务";
					}
					else{
						echo "商品";
					}
					?></a></td>
				<td><a href="#"><?php echo $_v->comm_name; ?></a></td>
				<td><?php echo $_v->comm_price; ?></a></td>
				<td><?php echo $_v->comm_discount; ?></a></td>
				<td><?php echo $_v->comm_on_shelve_time; ?></a></td>
				<td><?php echo $_v->comm_off_shelve_time; ?></a></td>
				<td><?php echo $_v->comm_update_time; ?></a></td>
				<td><?php echo $_v->comm_check_times; ?></a></td>
				<td><?php echo $_v->comm_intro1; ?></a></td>
				<td><?php echo $_v->comm_intro2; ?></a></td>
				<td><?php echo $_v->comm_intro3; ?></a></td>
				<td><?php echo $_v->comm_intro4; ?></a></td>
				<td><?php echo $_v->comm_intro5; ?></a></td>
				<td><?php
						if($_v->comm_is_hot == 1) {
							echo "是";
						}
						else{
							echo "否";
						}
					?></a></td>
				<td><?php
						if($_v->comm_is_show == 1) {
							echo "是";
						}
						else{
							echo "否";
						}
					?></a></td>
				<td><?php echo $_v->comm_sort_order; ?></a></td>
				<td>
					<script language="javascript">
						function delcfm() {
							if (!confirm("确认要删除？")) {
								window.event.returnValue = false;
							}
						}
					</script>
					<a href="./index.php?r=commodity/delService&id=<?php echo $_v->pk_comm_id ?>" onClick="delcfm()">删除</a>
				</td>
			</tr>
		<?php
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