<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>修改商品</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./index.php?r=commodity/show">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
	<?php $form = $this->beginWidget('CActiveForm'); ?>
	<table border="1" width="100%" class="table_a">
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_kind'); ?>
			</td>
			<td>
				<?php echo $form->dropDownList($commodity_model,'comm_kind',array('商品','服务')); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($commodity_model, 'comm_name'); ?>
			</td>
			<td>
				<?php echo $form->textField($commodity_model,'comm_name'); ?>
				<?php echo $form->error($commodity_model,'comm_name'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($commodity_model, 'comm_price'); ?>
			</td>
			<td>
				<?php echo $form->textField($commodity_model,'comm_price'); ?>
				<?php echo $form->error($commodity_model,'comm_price'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_discount'); ?>
			</td>
			<td>
				<?php echo $form->textField($commodity_model,'comm_discount'); ?>
				<?php echo $form->error($commodity_model,'comm_discount'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($commodity_model, 'comm_intro1'); ?>
			</td>
			<td>
				<?php echo $form->textArea($commodity_model,'comm_intro1',array('cols'=>100,'rows'=>5)); ?>
				<?php echo $form->error($commodity_model,'comm_intro1'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_intro2'); ?>
			</td>
			<td>
				<?php echo $form->textArea($commodity_model,'comm_intro2',array('cols'=>100,'rows'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_intro3'); ?>
			</td>
			<td>
				<?php echo $form->textArea($commodity_model,'comm_intro3',array('cols'=>100,'rows'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_intro4'); ?>
			</td>
			<td>
				<?php echo $form->textArea($commodity_model,'comm_intro4',array('cols'=>100,'rows'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_intro5'); ?>
			</td>
			<td>
				<?php echo $form->textArea($commodity_model,'comm_intro5',array('cols'=>100,'rows'=>5)); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_is_hot'); ?>
			</td>
			<td>
				<?php echo $form->dropDownList($commodity_model,'comm_is_hot',array('否','是')); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_is_show'); ?>
			</td>
			<td>
				<?php echo $form->dropDownList($commodity_model,'comm_is_show',array('否','是')); ?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->label($commodity_model, 'comm_sort_order'); ?>
			</td>
			<td>
				<?php echo $form->textField($commodity_model,'comm_sort_order'); ?>
				<?php echo $form->error($commodity_model,'comm_sort_order'); ?>
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