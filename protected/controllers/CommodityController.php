<?php

/**
 * 商品控制器
 * Class CommodityController
 */
class CommodityController extends Controller
{
	/**
	 * 商品展示
	 * @throws CException
	 */
	public function actionShow()
	{
		//通过模型来实现数据表信息查询
		//产生模型对象
		$commodity_model = Commodity::model();

		//判断Filter是否被用户选择了
		if(isset($_POST["comm_is_show"])){
			if($_POST["comm_is_show"]==2 && $_POST["comm_kind"]==0 && $_POST["comm_is_hot"]==2){
				$findByFilter = 0;  //用户没有选择，只是单纯刷新页面，需要查询所有记录
			}
			else{
				$findByFilter = 1;  //需要按照filter查询记录
			}
		}
		else{
			$findByFilter = 0;  //首次进入页面，需要查询所有记录
		}

		$commodity_info1 = $commodity_model->findAll();
		if($findByFilter == 0){

		}
		else{
			if($_POST["comm_is_show"]!=2) {
				$commodity_info1 = $commodity_model->findAllByAttributes(array('comm_is_show'=>$_POST["comm_is_show"]));
			}
			if($_POST["comm_kind"]!=0){
				$commodity_info2 = $commodity_info1->findAllByAttributes(array('comm_kind'=>$_POST["comm_kind"]));
			}
			if($_POST["comm_is_hot"]!=2){
				$commodity_info3 = $commodity_info2->findAllByAttributes(array('comm_is_hot'=>$_POST["comm_is_hot"]));
			}
		}

		//传递到视图
		$this->renderPartial('show',array('commodity_info'=>$commodity_info1));
	}

	/**
	 * 商品增加
	 * @throws CException
	 */
	public function actionAdd()
	{
		$commodity_model = new Commodity();

		if(isset($_POST["Commodity"]["comm_name"]) &&
			isset($_POST["Commodity"]["comm_price"]) &&
			isset($_POST["Commodity"]["comm_discount"]) &&
			isset($_POST["Commodity"]["comm_intro1"])) {

			//foreach ($_POST["Commodity"] as $_name=>$_value) {
			//	$commodity_model->$_name = $_value;
			//}
			$commodity_model->attributes = $_POST["Commodity"];

			//DB内的值为1和2，网页上的值为0和1
			if( $_POST["Commodity"]["comm_kind"] == 0 ){
				$commodity_model->comm_kind = 1;
			}
			else{
				$commodity_model->comm_kind = 2;
			}

			//如果商品为表示的，则认定商品已经上架
			if($commodity_model->comm_is_show == 1) {
				$commodity_model->comm_on_shelve_time = date("Y-m-d H:i:s", time());
			}

			//插入DB
			if($commodity_model->save()) {
				//页面重定向
				$this->redirect('./index.php?r=commodity/show');
			}
			else{
				echo "<script>alert('".$_POST["Commodity"]["comm_name"]." 添加失败');</script>";
			}
		}
		$this->renderPartial('add',array('commodity_model'=>$commodity_model));
	}

	/**
	 * 商品修改
	 * @throws CException
	 */
	public function actionUpdate($id)
	{
		$commodity_model = Commodity::model();
		$commodity_info = $commodity_model->findByPk($id);

		//修改前先记录商品是否表示的信息，用来判断商品是否下架
		$commodity_show = $commodity_info->comm_is_show;

		if(isset($_POST["Commodity"]["comm_name"]) &&
			isset($_POST["Commodity"]["comm_price"]) &&
			isset($_POST["Commodity"]["comm_discount"]) &&
			isset($_POST["Commodity"]["comm_intro1"])) {

			foreach ($_POST["Commodity"] as $_name=>$_value) {
				$commodity_info->$_name = $_value;
			}

			//DB内的值为1和2，网页上的值为0和1
			if( $_POST["Commodity"]["comm_kind"] == 0 ){
				$commodity_info->comm_kind = 2;
			}
			else{
				$commodity_info->comm_kind = 1;
			}

			//修改时间
			$commodity_info->comm_update_time = date("Y-m-d H:i:s",time());

			//如果从 不表示变为表示 ，则认为货品下架，需要记录下架时间
			if(($commodity_show == 1) &&
				($commodity_info->comm_is_show != 1)){
				//下架时间更新
				$commodity_info->comm_off_shelve_time = date("Y-m-d H:i:s",time());
			}
			elseif(($commodity_show != 1) &&
				($commodity_info->comm_is_show == 1)){
				//上架时间更新
				$commodity_info->comm_on_shelve_time = date("Y-m-d H:i:s",time());
				//下架时间更新（设空）
				$commodity_info->comm_off_shelve_time = null;
			}

			//插入DB
			if($commodity_info->save()) {
				//页面重定向
				$this->redirect('./index.php?r=commodity/show');
			}
			else{
				echo "<script>alert('".$_POST["Commodity"]["comm_name"]." 修改失败');</script>";
			}
		}

		$this->renderPartial('Update',array("commodity_model"=>$commodity_info));
	}

	/**
	 * 商品删除
	 */
	public function actionDel($id)
	{
		$commodity_model = Commodity::model();
		$commodity_info = $commodity_model->findByPk($id);
		if($commodity_info->delete()){
			$this->redirect('./index.php?r=commodity/show');
		}
		else{
			echo "<script>alert('".$commodity_info->comm_name." 删除失败');</script>";
		}
	}

	/**
	 * 商品筛选
	 */
	public function actionFilter()
	{
		echo "success";
	}
}