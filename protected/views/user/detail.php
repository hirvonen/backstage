<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>用户详细信息</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：用户管理-》用户详细信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=user/show">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
	<?php $form = $this->beginWidget('CActiveForm'); ?>
	<table border="1" width="100%" class="table_a">
		<tr>
			<td>
				<?php echo $form->label($user_info, 'pk_usr_id'); ?>
			</td>
			<td>
				<?php echo $form->label($user_info,$user_info->pk_usr_id); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_kind'); ?>
			</td>
			<td>
				<?php
					if($user_info->usr_kind == 0) {
						echo $form->label($user_info,"管理员");
					}
					elseif($user_info->usr_kind == 1){
						echo $form->label($user_info,"理疗师");
					}
					elseif($user_info->usr_kind == 2){
						echo $form->label($user_info,"顾客");
					}
					else{
						echo $form->label($user_info,"未知");
					}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_reg_kind'); ?>
			</td>
			<td>
				<?php
					if($user_info->usr_reg_kind == 0) {
						echo $form->label($user_info,"微信用户");
					}
					elseif($user_info->usr_reg_kind == 1){
						echo $form->label($user_info,"新浪微博用户");
					}
					elseif($user_info->usr_reg_kind == 2){
						echo $form->label($user_info,"QQ用户");
					}
					elseif($user_info->usr_reg_kind == 3){
						echo $form->label($user_info,"腾讯微博用户");
					}
					elseif($user_info->usr_reg_kind == 4){
						echo $form->label($user_info,"网站注册用户");
					}
					else{
						echo $form->label($user_info,"未知");
					}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_open_id'); ?>
			</td>
			<td>
				<?php echo $form->label($user_info,$user_info->usr_open_id); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_username'); ?>
			</td>
			<td>
				<?php echo $form->label($user_info,$user_info->usr_username); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_password'); ?>
			</td>
			<td>
				<span style="float:left;margin-left: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=user/initPassword&id=<?php echo $user_info->pk_usr_id ?>">初始化用户密码</a>
                </span>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_create_time'); ?>
			</td>
			<td>
				<?php echo $form->label($user_info,$user_info->usr_create_time); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_last_login'); ?>
			</td>
			<td>
				<?php echo $form->label($user_info,$user_info->usr_last_login); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_status'); ?>
			</td>
			<td>
				<?php echo $form->label($user_info,$user_info->usr_status); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($user_info, 'usr_pic_id'); ?>
			</td>
			<td>
				<?php echo $form->label($user_info,$user_info->usr_pic_id); ?>
			</td>
		</tr>


		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="修改">
			</td>
		</tr>
	</table>
	<?php $this->endWidget(); ?>
</div>
</body>
</html>