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
                <span style="float: left;">当前位置是：用户管理-》用户一览</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="./index.php?r=user/add">【添加用户】</a>
                </span>
            </span>
</div>
<div></div>
<div class="div_search">
            <span>
                <?php $form = $this->beginWidget('CActiveForm'); ?>
	            种别<select name="usr_kind" style="width: 100px;">
		            <option selected="selected" value="0">请选择</option>
		            <option value="1">管理员</option>
		            <option value="2">顾客</option>
		            <option value="2">理疗师</option>
	            </select>
	                <input value="查询" type="submit" />
	            <?php $this->endWidget(); ?>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;">
	<table class="table_a" border="1" width="100%">
		<tbody><tr style="font-weight: bold;">
			<td align="center">操作</td>
			<td>用户编号</td>
			<td>用户种别</td>
			<td>用户注册来源</td>
			<td>用户名</td>
			<td>创建时间</td>
		</tr>
		<?php
		foreach ($user_info as $_v) {
			?>
			<tr id="user1">
				<td><a href="./index.php?r=user/detail&id=<?php echo $_v->pk_usr_id ?>">详细</a></td>
				<td><?php echo $_v->pk_usr_id ?></td>
				<td><?php
					if($_v->usr_kind == 0) {
						echo "管理员";
					}
					elseif($_v->usr_kind == 1){
						echo "理疗师";
					}
					elseif($_v->usr_kind == 2){
						echo "顾客";
					}
					else{
						echo "未知";
					}
					?></a></td>
				<td><?php
					if($_v->usr_reg_kind == 0) {
						echo "微信用户";
					}
					elseif($_v->usr_reg_kind == 1){
						echo "新浪微博用户";
					}
					elseif($_v->usr_reg_kind == 2){
						echo "QQ用户";
					}
					elseif($_v->usr_reg_kind == 3){
						echo "腾讯微博用户";
					}
					elseif($_v->usr_reg_kind == 4){
						echo "网站注册用户";
					}
					else{
						echo "未知";
					}
					?></a></td>
				<td><?php echo $_v->usr_username; ?></a></td>
				<td><?php echo $_v->usr_create_time; ?></a></td>
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