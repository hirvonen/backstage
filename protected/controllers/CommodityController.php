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
		$this->renderPartial('show');

		//通过模型来实现数据表信息查询
		//产生模型对象
		$commodity_model = Commodity::model();
		//通过模型对象调用相关方法查询数据
		$commodity_info = $commodity_model->find();
		echo $commodity_info->comm_name;
		//var_dump($commodity_info);
	}

	/**
	 * 商品增加
	 * @throws CException
	 */
	public function actionAdd()
	{
		$this->renderPartial('add');
	}

	/**
	 * 商品修改
	 * @throws CException
	 */
	public function actionUpdate()
	{
		$this->renderPartial('Update');
	}
}