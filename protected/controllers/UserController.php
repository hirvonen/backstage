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
		$this->renderPartial("login");
	}

	/**
	 * 用户一览
	 */
	public function actionShow()
	{
		$user_model = User::model();
		$user_info = $user_model->findAll();
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
		$user_model = User::model();
		$user_info = $user_model->findByPk($id);
		if($user_info->delete()){
			$this->redirect('./index.php?r=user/show');
		}
		else{
			echo "<script>alert('".$user_model->usr_name." 删除失败');</script>";
		}
		//因为pk_usr_id被很多表当做外键使用，所以无法简单删除
		//本功能暂时不用
		//$this->redirect('./index.php?r=user/show');
	}
}