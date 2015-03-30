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
				'actions'=>array('show','cal','detail'),
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
        $aptm_model = Aptm::model();

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

    /**
     * 预约详细页面（可修改）
     */
    public function actionDetail($id, $source_page)
    {
        $aptm_model = Aptm::model();
        $aptm_info = $aptm_model->findByPk($id);
        if(isset($aptm_info)) {
            if (isset($_POST["Aptm"])) {
//                $aptm_info->attributes = $_POST["Aptm"];
                $aptm_info->aptm_beau_id = $_POST["Aptm"]["aptm_beau_id"];
                $aptm_info->aptm_time = $_POST["Aptm"]["aptm_time"];
                $aptm_info->aptm_status = $_POST["Aptm"]["aptm_status"];
                $aptm_info->aptm_course_no = $_POST["Aptm"]["aptm_course_no"];
                $aptm_info->aptm_cust_name = $_POST["Aptm"]["aptm_cust_name"];
                $aptm_info->aptm_cust_tel = $_POST["Aptm"]["aptm_cust_tel"];
                $aptm_info->aptm_cust_addr = $_POST["Aptm"]["aptm_cust_addr"];

                if($aptm_info->save()){
                    if(isset($_GET["source_page"])){
                        switch($_GET["source_page"]){
                            case "cal":
                                $this->redirect("./index.php?r=aptm/cal");
                                break;
                            case "show":
                            default:
                                $this->redirect("./index.php?r=aptm/show");
                                break;
                        }
                    }
                }
                else {
                    //var_dump($user_info->getErrors());
                    //var_dump($customer_info->getErrors());
                    echo "<script>alert('订单信息修改失败！');</script>";
                }
            }

            //订单详细信息
            $this->renderPartial('Detail', array("aptm_info"=>$aptm_info, "source_page"=>$source_page));
        }
        else{
            echo "<script>alert('未找到该预约！');</script>";
        }
    }

    /**
     * 预约视图（以视图方式显示预约情况以便查询）
     */
    public function actionCal()
    {
        $aptm_model = Aptm::model();
        $aptm_info = $aptm_model->findAll();

        $beau_model = Beautician::model();
        $beau_info = $beau_model->findAll();

        $this->renderPartial("Cal",array('aptm_info'=>$aptm_info,'beau_info'=>$beau_info));
    }
}