<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>预约视图</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link href="<?php echo BACK_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<!--<div class="div_head">-->
<!--            <span>-->
<!--                <span style="float:left">当前位置是：预约管理-》预约视图</span>-->
<!--	            <span style="float:right;margin-right: 8px;font-weight: bold">-->
<!--                    <a style="text-decoration: none" href="./index.php?r=aptm/show">【返回】</a>-->
<!--                </span>-->
<!--            </span>-->
<!--</div>-->
<div></div>
<div>
	<?php
	$day = date("Y-m-d", time());
	echo '<table border="1" width="100%" class="table_a">';
	echo '<tr>';
	echo '<td width="100">理疗师</td>';
	for($i=0;$i<15;$i++){
		if($i%2 == 0) {
			echo "<td bgcolor='#add8e6'>".$day.'</td>';
		}
		else{
			echo "<td bgcolor='#7fffd4'>".$day.'</td>';
		}
		$day = date("Y-m-d",strtotime("$day +1 day"));
	}
	echo '</tr>';

	//计算美容师人数，为第一层for循环做准备
	$beau_num = count($beau_info);

	//取得每个预约的美容师id，为第二层for循环做准备
	$aptm_num = count($aptm_info);
	$aptm_beau_name = array();
	$beau_model = Beautician::model();
	for($i=0;$i<$aptm_num;$i++){
		$aptm_item = $aptm_info[$i];
		$beau_item_1 = $beau_model->findByPk($aptm_item->aptm_beau_id);
		if(isset($beau_item_1)) {
			$aptm_beau_name[$i] = $beau_item_1->beau_realname;
		}
		else{
			$aptm_beau_name[$i] = "NULL";
		}
	}

	$day = date("Y-m-d", time());

	//输出未安排理疗师表
	echo "<tr>";
	echo "<td>未安排</td>";
	for($i=0;$i<15;$i++){
		$null_aptm = array();
		$null_aptm_name = array();
		for($j=0;$j<$aptm_num;$j++){
			$null_aptm_item = $aptm_info[$j];
			$null_time = date("Y-m-d", strtotime($null_aptm_item->aptm_time));
			if(($null_time==$day)&&($null_aptm_item->aptm_beau_id==null)) {
				$null_aptm_name[0] = $null_aptm_item->pk_aptm_id;
				$null_aptm_name[1] = $null_aptm_item->aptm_cust_name;
				$null_aptm_name[2] = date('H:i', strtotime($null_aptm_item->aptm_time));
				$null_aptm[count($null_aptm)] = $null_aptm_name;
			}
		}
		if(isset($null_aptm)){
			echo "<td width='120'>";
			for ($k=0;$k<count($null_aptm);$k++) {
				echo "<a style='text-decoration: underline' href='./index.php?r=aptm/detail&id=".
					$null_aptm[$k][0].
					"&source_page=cal"."'>".
					$null_aptm[$k][1].
					" ".
					$null_aptm[$k][2].
					"</a>";
				echo "<br>";
			}
			echo "</td>";
		}
		else{
			echo "<td width='120'></td>";
		}
		$day = date("Y-m-d",strtotime("$day +1 day"));
	}
	echo "</tr>";

	//输出理疗师日程表
	for($i=0;$i<$beau_num;$i++){
		$beau_item = $beau_info[$i];
		echo '<tr>';
		echo '<td>'.$beau_item->beau_realname.'</td>';
		$day = date("Y-m-d", time());
		for($j=0;$j<15;$j++){
			$one_day_multi_check = array();
			$aptm_id_time = array();
			//按照日期来轮巡
			for($k=0;$k<$aptm_num;$k++){
				//找到当天的日期
				$aptm_item = $aptm_info[$k];
				//$beau_item_1 = $beau_model->findAllByPk($aptm_item->aptm_beau_id);
				$time = date("Y-m-d", strtotime($aptm_item->aptm_time));
				if(($time==$day)&&($beau_item->beau_realname==$aptm_beau_name[$k])){
					$aptm_id_time[0] = $aptm_item->pk_aptm_id;
					$aptm_id_time[1] = $aptm_item->aptm_cust_name;
					$aptm_id_time[2] = date("H:i", strtotime($aptm_item->aptm_time));
					$one_day_multi_check[count($one_day_multi_check)] = $aptm_id_time;
				}
			}

			//输出格子
			switch(count($one_day_multi_check)){
				case 0:
					echo "<td width='120' bgcolor='green'>无预约</td>";
					break;
				case 1:
					echo "<td width='120' bgcolor='#1e90ff'>";
					echo "<a style='text-decoration: underline' href='./index.php?r=aptm/detail&id=".
						$one_day_multi_check[0][0].
						"&source_page=cal"."'>".
						$one_day_multi_check[0][1].
						" ".
						$one_day_multi_check[0][2].
						"</a>";
					echo "</td>";
					break;
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
				case 11:
				case 12:
				case 13:
				case 14:
				case 15:
					echo "<td width='120' bgcolor='red'>";
					for($oneday_time=0;$oneday_time<count($one_day_multi_check);$oneday_time++){
						echo "<a style='text-decoration: underline' href='./index.php?r=aptm/detail&id=".
							$one_day_multi_check[$oneday_time][0].
							"&source_page=cal"."'>".
							$one_day_multi_check[$oneday_time][1].
							" ".
							$one_day_multi_check[$oneday_time][2].
							"</a>";
						echo "<br>";
					}
					echo "</td>";
					break;
				default:
					echo "<td bgcolor='yellow'>sth went wrong!</td>";
			}
			$day = date("Y-m-d",strtotime("$day +1 day"));
		}

		echo '</tr>';
	}

	echo '</table>';
	?>
</div>
<div style="font-size: 13px;margin: 10px 5px">
	<table border="1" width="100%" class="table_a">
		<tr bgcolor="#add8e6">
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr bgcolor="#ffffff">
			<td>
			</td>
			<td>
			</td>
		</tr>
	</table>
</div>

</body>
</html>