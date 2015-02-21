<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

	<title>商品列表</title>

	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet" />
</head>
<body>
<style>
	.tr_color{background-color: #9F88FF}
</style>
<div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="./index.php?r=commodity/add">【添加商品】</a>
                </span>
            </span>
</div>
<div></div>
<div class="div_search">
            <span>
                <form action="#" method="get">
	                品牌<select name="s_product_mark" style="width: 100px;">
		                <option selected="selected" value="0">请选择</option>
		                <option value="1">苹果apple</option>
	                </select>
	                <input value="查询" type="submit" />
                </form>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;">
	<table class="table_a" border="1" width="100%">
		<tbody><tr style="font-weight: bold;">
			<td>序号</td>
			<td>商品名称</td>
			<td>价格</td>
			<td>种别</td>
			<td>上架时间</td>
			<td>下架时间</td>
			<td>变更时间</td>
			<td>点击次数</td>
			<td>折扣信息</td>
			<td>介绍1</td>
			<td>介绍2</td>
			<td>介绍3</td>
			<td>介绍4</td>
			<td>介绍5</td>
			<td>热门商品</td>
			<td>是否显示</td>
			<td>排序</td>
			<td align="center">操作</td>
		</tr>
		<?php
		$increment = 1;
		foreach ($commodity_info as $_v) {
		?>
			<tr id="product1">
				<td><?php echo $increment ?></td>
				<td><a href="#"><?php echo $_v->comm_name; ?></a></td>
				<td><?php echo $_v->comm_price; ?></a></td>
				<td><?php
						if($_v->comm_kind == 1) {
							echo "服务";
						}
						else{
							echo "产品";
						}
						?></a></td>
				<td><?php echo $_v->comm_on_shelve_time; ?></a></td>
				<td><?php echo $_v->comm_off_shelve_time; ?></a></td>
				<td><?php echo $_v->comm_update_time; ?></a></td>
				<td><?php echo $_v->comm_check_times; ?></a></td>
				<td><?php echo $_v->comm_discount; ?></a></td>
				<td><?php echo $_v->comm_intro1; ?></a></td>
				<td><?php echo $_v->comm_intro2; ?></a></td>
				<td><?php echo $_v->comm_intro3; ?></a></td>
				<td><?php echo $_v->comm_intro4; ?></a></td>
				<td><?php echo $_v->comm_intro5; ?></a></td>
				<td><?php echo $_v->comm_is_hot; ?></a></td>
				<td><?php echo $_v->comm_is_show; ?></a></td>
				<td><?php echo $_v->comm_sort_order; ?></a></td>
				<td><a href="./index.php?r=commodity/update">修改</a></td>
				<td><a href="javascript:;" onclick="delete_product(1)">删除</a></td>
			</tr>
		<?php
			$increment++;
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