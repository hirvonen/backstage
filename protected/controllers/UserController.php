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
}