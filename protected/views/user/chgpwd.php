<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>修改密码</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：用户管理-》修改密码</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=index/index">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	<table border="1" width="100%" class="table_a">
		<tr>
			<td>
				<?php echo $form->labelEx($user_info, 'user_chg_pwd_old'); ?>
			</td>
			<td>
				<?php echo $form->passwordField($user_info,'user_chg_pwd_old'); ?>
				<?php echo $form->error($user_info,'user_chg_pwd_old'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($user_info, 'user_chg_pwd_new'); ?>
			</td>
			<td>
				<?php echo $form->passwordField($user_info,'user_chg_pwd_new'); ?>
				<?php echo $form->error($user_info,'user_chg_pwd_new'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($user_info, 'user_chg_pwd_new_cfm'); ?>
			</td>
			<td>
				<?php echo $form->passwordField($user_info,'user_chg_pwd_new_cfm'); ?>
				<?php echo $form->error($user_info,'user_chg_pwd_new_cfm'); ?>
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