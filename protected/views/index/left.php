<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv=content-type content="text/html; charset=utf-8" />
	<link href="<?php echo BACK_CSS_URL; ?>admin.css" type="text/css" rel="stylesheet" />
	<script language=javascript>
		function expand(el)
		{
			childobj = document.getElementById("child" + el);

			if (childobj.style.display == 'none')
			{
				childobj.style.display = 'block';
			}
			else
			{
				childobj.style.display = 'none';
			}
			return;
		}
	</script>
</head>
<body>
<table height="100%" cellspacing=0 cellpadding=0 width=170
       background=<?php echo BACK_IMG_URL; ?>menu_bg.jpg border=0>
	<tr>
		<?php if(!Yii::app()->user->getIsGuest()){ ?>
		<td valign=top align=middle>
			<table cellspacing=0 cellpadding=0 width="100%" border=0>

				<tr>
					<td height=10></td></tr></table>
<!--			<table cellspacing=0 cellpadding=0 width=150 border=0>-->
<!---->
<!--				<tr height=22>-->
<!--					<td style="padding-left: 30px" background=--><?php //echo BACK_IMG_URL; ?><!--menu_bt.jpg><a-->
<!--							class=menuparent onclick=expand(1)-->
<!--							href="javascript:void(0);">关于我们</a></td></tr>-->
<!--				<tr height=4>-->
<!--					<td></td></tr></table>-->
<!--			<table id=child1 style="display: none" cellspacing=0 cellpadding=0-->
<!--			       width=150 border=0>-->
<!--				<tr height=20>-->
<!--					<td align=middle width=30><img height=9-->
<!--					                               src="--><?php //echo BACK_IMG_URL; ?><!--menu_icon.gif" width=9></td>-->
<!--					<td><a class=menuchild-->
<!--					       href="#"-->
<!--					       target=main>公司简介</a></td></tr>-->
<!--				<tr height=20>-->
<!--					<td align=middle width=30><img height=9-->
<!--					                               src="--><?php //echo BACK_IMG_URL; ?><!--menu_icon.gif" width=9></td>-->
<!--					<td><a class=menuchild-->
<!--					       href="#"-->
<!--					       target=main>荣誉资质</a></td></tr>-->
<!--				<tr height=20>-->
<!--					<td align=middle width=30><img height=9-->
<!--					                               src="--><?php //echo BACK_IMG_URL; ?><!--menu_icon.gif" width=9></td>-->
<!--					<td><a class=menuchild-->
<!--					       href="#"-->
<!--					       target=main>分类管理</a></td></tr>-->
<!--				<tr height=20>-->
<!--					<td align=middle width=30><img height=9-->
<!--					                               src="--><?php //echo BACK_IMG_URL; ?><!--menu_icon.gif" width=9></td>-->
<!--					<td><a class=menuchild-->
<!--					       href="#"-->
<!--					       target=main>子类管理</a></td></tr>-->
<!--				<tr height=4>-->
<!--					<td colspan=2></td></tr></table>-->
<!--			<table cellspacing=0 cellpadding=0 width=150 border=0>-->
<!--				<tr height=22>-->
<!--					<td style="padding-left: 30px" background=--><?php //echo BACK_IMG_URL; ?><!--menu_bt.jpg><a-->
<!--							class=menuparent onclick=expand(2)-->
<!--							href="javascript:void(0);">新闻中心</a></td></tr>-->
<!--				<tr height=4>-->
<!--					<td></td></tr></table>-->
<!--			<table id=child2 style="display: none" cellspacing=0 cellpadding=0-->
<!--			       width=150 border=0>-->
<!--				<tr height=20>-->
<!--					<td align=middle width=30><img height=9-->
<!--					                               src="--><?php //echo BACK_IMG_URL; ?><!--menu_icon.gif" width=9></td>-->
<!--					<td><a class=menuchild-->
<!--					       href="#"-->
<!--					       target=main>公司新闻</a></td></tr>-->
<!--				<tr height=20>-->
<!--					<td align=middle width=30><img height=9-->
<!--					                               src="--><?php //echo BACK_IMG_URL; ?><!--menu_icon.gif" width=9></td>-->
<!--					<td><a class=menuchild-->
<!--					       href="#"-->
<!--					       target=main>分类管理</a></td></tr>-->
<!--				<tr height=20>-->
<!--					<td align=middle width=30><img height=9-->
<!--					                               src="--><?php //echo BACK_IMG_URL; ?><!--menu_icon.gif" width=9></td>-->
<!--					<td><a class=menuchild-->
<!--					       href="#"-->
<!--					       target=main>子类管理</a></td></tr>-->
<!--				<tr height=4>-->
<!--					<td colspan=2></td></tr></table>-->
			<table cellspacing=0 cellpadding=0 width=150 border=0>
				<tr height=22>
					<td style="padding-left: 30px" background=<?php echo BACK_IMG_URL; ?>menu_bt.jpg><a
							class=menuparent onclick=expand(3)
							href="javascript:void(0);">商品管理</a></td></tr>
				<tr height=4>
					<td></td></tr></table>
			<table id=child3 style="display: none" cellspacing=0 cellpadding=0
			       width=150 border=0>
                <tr height=20>
                    <td align=middle width=30><img height=9
                                                   src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
                    <td><a class=menuchild
                           href="./index.php?r=commodity/showService"
                           target="right">服务一览</a></td></tr>
				<tr height=20>
					<td align=middle width=30><img height=9
					                               src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
					<td><a class=menuchild
					       href="./index.php?r=commodity/showProduct"
					       target="right">商品一览</a></td></tr>
				<tr height=4>
					<td colspan=2></td></tr></table>
			<table cellspacing=0 cellpadding=0 width=150 border=0>
				<tr height=22>
					<td style="padding-left: 30px" background=<?php echo BACK_IMG_URL; ?>menu_bt.jpg><a
							class=menuparent onclick=expand(4)
							href="javascript:void(0);">用户管理</a></td></tr>
				<tr height=4>
					<td></td></tr></table>
			<table id=child4 style="display: none" cellspacing=0 cellpadding=0
			       width=150 border=0>
				<tr height=20>
					<td align=middle width=30><img height=9
					                               src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
					<td><a class=menuchild
					       href="./index.php?r=user/show"
					       target="right">用户一览</a></td></tr>
				<tr height=20>
					<td align=middle width=30><img height=9
					                               src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
					<td><a class=menuchild
					       href="./index.php?r=user/show_review"
					       target="right">用户评价一览</a></td></tr>
				<tr height=4>
					<td colspan=2></td></tr></table>
			<table cellspacing=0 cellpadding=0 width=150 border=0>
				<tr height=22>
					<td style="padding-left: 30px" background=<?php echo BACK_IMG_URL; ?>menu_bt.jpg><a
							class=menuparent onclick=expand(5)
							href="javascript:void(0);">交易管理</a></td></tr>
				<tr height=4>
					<td></td></tr></table>
			<table id=child5 style="display: none" cellspacing=0 cellpadding=0
			       width=150 border=0>

				<tr height=20>
					<td align=middle width=30><img height=9
					                               src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
					<td><a class=menuchild
					       href="./index.php?r=order/show"
					       target=right>订单一览</a></td></tr>
				<tr height=20>
					<td align=middle width=30><img height=9
					                               src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
					<td><a class=menuchild
					       href="./index.php?r=aptm/show"
					       target=right>预约一览</a></td></tr>
				<tr height=20>
					<td align=middle width=30><img height=9
					                               src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
					<td><a class=menuchild
					       href="./index.php?r=aptm/cal"
					       target=right>预约视图</a></td></tr>
				<tr height=4>
					<td colspan=2></td></tr></table>
			<table cellspacing=0 cellpadding=0 width=150 border=0>

				<tr height=22>
					<td style="padding-left: 30px" background=<?php echo BACK_IMG_URL; ?>menu_bt.jpg><a
							class=menuparent onclick=expand(6)
							href="javascript:void(0);">数据管理</a></td></tr>
				<tr height=4>
					<td></td></tr></table>
			<table id=child6 style="display: none" cellspacing=0 cellpadding=0
			       width=150 border=0>

				<tr height=20>
					<td align=middle width=30><img height=9
					                               src="<?php echo BACK_IMG_URL; ?>menu_icon.gif" width=9></td>
					<td><a class=menuchild
					       href="./index.php?r=commodity/showSale"
					       target=right>销量一览</a></td></tr>
				<tr height=4>
					<td colspan=2></td></tr></table>
		<td width=1 bgcolor=#d1e6f7></td>
		<?php
			}else {
				echo "尚未登录";
			}
		?>
	</tr>
</table>
</body>
</html>