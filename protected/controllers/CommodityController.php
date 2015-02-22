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
		//通过模型对象调用相关方法查询数据
		$commodity_info = $commodity_model->findAll();
		//echo $commodity_info->comm_name;
		//var_dump($commodity_info);

		//传递到视图
		$this->renderPartial('show',array('commodity_info'=>$commodity_info));
	}

	/**
	 * 商品增加
	 * @throws CException
	 */
	public function actionAdd()
	{
		$commodity_model = new Commodity();
		$this->renderPartial('add',array('commodity_model'=>$commodity_model));
	}

	/**
	 * 商品修改
	 * @throws CException
	 */
	public function actionUpdate()
	{
		$this->renderPartial('Update');
	}

	/**
	 * 通过模型实现数据添加
	 */
	public function actionJia()
	{
		//1 创建模型对象
		$commodity_model = new Commodity();
		//2 为对象丰富属性
		$commodity_model->comm_name = "aaaa";
		//3 调用save()方法实现数据添加
		if( $commodity_model->save() ){
			echo "success";
		}
		else{
			echo "fail";
		}
	}
}