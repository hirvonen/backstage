<?php

/**
 * 用户控制器
 * Class UserController
 */
class UserController extends Controller
{
	/**
	 * 登陆
	 * @throws CException
	 */
	public function actionLogin()
	{
		$user_login = new LoginForm;

		if(isset($_POST['LoginForm'])){
			//收集表单信息
			$user_login->attributes = $_POST['LoginForm'];

			//校验数据，最终走的是rules()方法
			if($user_login->validate() && $user_login->login()){
				$this->redirect('./index.php?r=index/index');
			}

		}

		$this->renderPartial("login",array('user_login'=>$user_login));
	}

	/**
	 * 用户退出系统，删除session信息
	 */
	public function actionLogout()
	{
		Yii::app()->session->clear();
		Yii::app()->session->destroy();
		$this->redirect('./index.php?r=user/login');
	}

	/**
	 * 用户一览
	 */
	public function actionShow()
	{
		$user_model = User::model();

		if(isset($_POST["usr_kind"])){
			if($_POST["usr_kind"]==0){
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
			if ($_POST["usr_kind"] != 0) {
				$user_info = $user_model->findAllByAttributes(array('usr_kind' => $_POST["usr_kind"]));
			}
			else{
				$user_info = $user_model->findAll();
			}
		}
		else{
			$user_info = $user_model->findAll();
		}

		$this->renderPartial("Show",array('user_info'=>$user_info));
	}

	/**
	 * 用户详细信息
	 */
	public function actionDetail($id)
	{
		$user_model = User::model();
		$user_info = $user_model->findByPk($id);

		$this->renderPartial('Detail',array("user_info"=>$user_info));
	}

	/**
	 * 删除用户
	 */
	public function actionDel($id)
	{
		/*
		$user_model = User::model();
		$user_info = $user_model->findByPk($id);
		if($user_info->delete()){
			$this->redirect('./index.php?r=user/show');
		}
		else{
			echo "<script>alert('".$user_model->usr_name." 删除失败');</script>";
		}*/
		//因为pk_usr_id被很多表当做外键使用，所以无法简单删除
		//本功能暂时不用
		//$this->redirect('./index.php?r=user/show');
		echo "<script>alert('因为pk_usr_id被很多表当做外键使用，所以无法简单删除。本功能暂时封印。');</script>";
	}

	/**
	 * 初始化用户密码
	 */
	public function actionInitPassword($id)
	{
		$user_model = User::model();
		$user_info = $user_model->findByPk($id);
		$user_info->usr_password = md5("xyz123456");
		if($user_info->save())
			echo "<script>alert('用户密码已被初始化为“xyz123456”。请尽快登录修改密码。');</script>";
		//$this->redirect('./index.php?r=user/show');
	}
}