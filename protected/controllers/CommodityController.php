<?php

/**
 * 商品控制器
 * Class CommodityController
 */
class CommodityController extends Controller
{
	/**
	 * 服务一览
	 * @throws CException
	 */
	public function actionShowService()
	{
		//通过模型来实现数据表信息查询
		//产生模型对象
		$commodity_model = Commodity::model();

		//判断Filter是否被用户选择了
		if(isset($_POST["comm_is_show"])){
            if(($_POST["comm_is_show"]!=2)&&($_POST["comm_is_hot"]!=2)) {
				$commodity_info = $commodity_model->findAllByAttributes(array('comm_kind'=>"1",
                                                                                'comm_is_show'=>$_POST["comm_is_show"],
                                                                                'comm_is_hot'=>$_POST["comm_is_hot"]));
			}
			elseif($_POST["comm_is_show"]!=2){
                $commodity_info = $commodity_model->findAllByAttributes(array('comm_kind'=>"1",
                                                                                'comm_is_show'=>$_POST["comm_is_show"]));
			}
            elseif($_POST["comm_is_hot"]!=2){
                $commodity_info = $commodity_model->findAllByAttributes(array('comm_kind'=>"1",
                                                                                'comm_is_hot'=>$_POST["comm_is_hot"]));
			}
            else{
                $commodity_info = $commodity_model->findAllByAttributes(array('comm_kind'=>"1"));
            }
		}
        else{
            $commodity_info = $commodity_model->findAllByAttributes(array('comm_kind'=>"1"));
        }

		//传递到视图
		$this->renderPartial('showService',array('commodity_info'=>$commodity_info));
	}

	/**
	 * 服务增加
	 * @throws CException
	 */
	public function actionAddService()
	{
		$commodity_model = new Commodity();
        $commodity_service_model = new Commodity_Service();

		if(isset($_POST["Commodity"]) && isset($_POST["Commodity_Service"])) {

			//foreach ($_POST["Commodity"] as $_name=>$_value) {
			//	$commodity_model->$_name = $_value;
			//}
			$commodity_model->attributes = $_POST["Commodity"];
            $commodity_service_model->attributes = $_POST["Commodity_Service"];

			//DB内的值为1和2，网页上的值为0和1
			$commodity_model->comm_kind = 1;

			//如果商品为表示的，则认定商品已经上架
			if($commodity_model->comm_is_show == 1) {
				$commodity_model->comm_on_shelve_time = date("Y-m-d H:i:s", time());
			}

			//插入DB
			if($commodity_model->save()) {
				//页面重定向
                //Commodity_service的表单主键设置
                $commodity_service_model->pk_serv_id = $commodity_model->pk_comm_id;
                if($commodity_service_model->save()) {
                    $this->redirect('./index.php?r=commodity/showService');
                }
                else{
                    //删除已经插入的数据
                    $commodity_info = $commodity_model->findByPk($commodity_model->pk_comm_id);
                    $commodity_info->delete();

                    //出个警告
                    echo "<script>alert('".$_POST["Commodity"]["comm_name"]." 添加失败');</script>";
                }
			}
			else{
				echo "<script>alert('".$_POST["Commodity"]["comm_name"]." 添加失败');</script>";
			}
            /*echo "<pre>";
            print_r($_POST["Commodity"]);
            print_r($_POST["Commodity_Service"]);
            echo "</pre>";*/
		}
		$this->renderPartial('addService',array('commodity_model'=>$commodity_model,
                                                'commodity_service_model'=>$commodity_service_model));
	}

	/**
	 * 商品修改
	 * @throws CException
	 */
	public function actionUpdateService($id)
	{
		$commodity_model = Commodity::model();
		$commodity_info = $commodity_model->findByPk($id);

        if(!isset($commodity_info)){
            echo "<script>alert('commodity表中未找到该条记录！');</script>";
        }

        $commodity_service_model = Commodity_Service::model();
        $commodity_service_info = $commodity_service_model->findByPk($id);

        if(!isset($commodity_service_info)){
            echo "<script>alert('commodity_service表中未找到该条记录！');</script>";
        }

		//修改前先记录商品是否表示的信息，用来判断商品是否下架
		$commodity_show = $commodity_info->comm_is_show;

        if(isset($_POST["Commodity"]) && isset($_POST["Commodity_Service"])) {

			//foreach ($_POST["Commodity"] as $_name=>$_value) {
			//	$commodity_info->$_name = $_value;
			//}
            $commodity_info->attributes = $_POST["Commodity"];
            $commodity_service_info->attributes = $_POST["Commodity_Service"];

            $commodity_info->comm_kind = 1;

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
			if(($commodity_service_info->save())&&($commodity_info->save())) {
				//页面重定向
				$this->redirect('./index.php?r=commodity/showService');
			}
			else{
				echo "<script>alert('".$_POST["Commodity"]["comm_name"]." 修改失败');</script>";
			}
		}

		$this->renderPartial('UpdateService',array("commodity_model"=>$commodity_info,
                                            "commodity_service_model"=>$commodity_service_info));
	}

	/**
	 * 服务删除
	 */
	public function actionDelService($id)
	{
		$commodity_model = Commodity::model();
		$commodity_info = $commodity_model->findByPk($id);
        $commodity_service_model = Commodity_Service::model();
        $commodity_service_info = $commodity_service_model->findByPk($id);

        //如果有单独服务信息的话，先删除单独的服务信息，再删除主表信息
        if(isset($commodity_service_info)){
            if(($commodity_service_info->delete())&&($commodity_info->delete())){
                $this->redirect('./index.php?r=commodity/showService');
            }
            else{
                echo "<script>alert('".$commodity_info->comm_name." 删除失败');</script>";
            }
        }
        else{
            if($commodity_info->delete()){
                $this->redirect('./index.php?r=commodity/showService');
            }
            else{
                echo "<script>alert('".$commodity_info->comm_name." 删除失败');</script>";
            }
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