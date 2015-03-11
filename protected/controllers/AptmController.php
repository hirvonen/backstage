<?php

/**
 * 订单控制器
 * Class AppointmentController
 */
class AptmController extends Controller
{
	/**
	 * 用户访问过滤
	 */
	public function filters(){
		return array(
			'accessControl',
		);
	}

	/**
	 * 为具体方法设置具体访问条件
	 * * 全部用户(无论登录与否)
	 * ? 匿名用户
	 * 用户名 具体用户
	 * @ 登录用户
	 */
	public function accessRules(){
		return array(
			array(
				'allow',
				'actions'=>array('show'),
				'users'=>array('@'),
			),
//			array(
//				'allow',
//				'actions'=>array('login'),
//				'users'=>array('*'),
//			),
			array(
				'deny',
				'users'=>array('*'),
			),
		);
	}

	/**
	 * 一览表示
	 * @throws CException
	 */
	public function actionShow()
	{
        $aptm_model = Order::model();

        if(isset($_POST["aptm_status"])){
            if($_POST["aptm_status"]==0){
                $findByFilter = 0;  //用户没有选择，只是单纯刷新页面，需要查询所有记录
            }
            else{
                $findByFilter = 1;  //需要按照filter查询记录
            }
        }
        else{
            $findByFilter = 0;  //首次进入页面，需要查询所有记录
        }

        if($findByFilter != 0){
            if ($_POST["aptm_status"]!=0) {
                $aptm_status = $_POST["aptm_status"];
                $aptm_info = $aptm_model->findAllByAttributes(array('aptm_status' => $aptm_status));
            }
            else{
                $aptm_info = $aptm_model->findAll();
            }
        }
        else{
            $aptm_info = $aptm_model->findAll();
        }

        $this->renderPartial("Show",array('aptm_info'=>$aptm_info));
	}

}