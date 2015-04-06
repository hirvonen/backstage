<?php

/**
 * 订单控制器
 * Class OrderController
 */
class OrderController extends Controller
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
				'actions'=>array('show','detail','update','add'),
				'users'=>array('superadmin','admin'),
			),
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
        $order_model = Order::model();

        if(isset($_POST["ord_status"])){
            if($_POST["ord_status"]==0){
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
            if ($_POST["ord_status"]!=0) {
                $order_sts = $_POST["ord_status"];
                $order_info = $order_model->findAllByAttributes(array('ord_status' => $order_sts));
            }
            else{
                $order_info = $order_model->findAll();
            }
        }
        else{
            $order_info = $order_model->findAll();
        }

        $this->renderPartial("Show",array('order_info'=>$order_info));
	}

    /**
     * 新建订单
     */
    public function actionAdd()
    {
        $order_model = new Order();

        if(isset($_POST["Order"])){
            $order_model->attributes = $_POST["Order"];

            //订单用户检证
            $cust_model = Customer::model();
            if(!$cust_model->findByPk($order_model->ord_cust_id)) {
                echo "<script>alert('该用户不存在！');</script>";
            }
            else {
                //订单更新时间更新
                $order_model->ord_upt_time = date("Y-m-d H:i:s", time());

                if ($order_model->save()) {
                    $this->redirect("./index.php?r=order/show");
                } else {
                    //var_dump($user_info->getErrors());
                    //var_dump($customer_info->getErrors());
                    echo "<script>alert('订单添加失败！');</script>";
                }
            }
        }

        $this->renderPartial('Add', array("order_info" => $order_model));
    }

    /**
    * 订单详细信息
     */
    public function actionDetail($id)
    {
        $order_model = Order::model();
        $order_info = $order_model->findByPk($id);

        //查找出本订单相关的所有订单商品
        $query = 'select * from tbl_order_item where pk_ord_itm_ord_id = '.$order_info->pk_ord_id;
        $order_model = Order_Item::model();
        $order_item_info = $order_model->findAllBySql($query);

        if(isset($order_info)) {
            //订单详细信息
            $this->renderPartial('Detail', array('order_info'=>$order_info, 'order_item_info'=>$order_item_info));
        }
        else{
            echo "<script>alert('未找到该订单！');</script>";
        }
    }

    /**
     * 订单详细信息修改
     */
    public function actionUpdate($id, $ordItmID)
    {
        $order_model = Order::model();
        $order_info = $order_model->findByPk($id);

        //查找出本订单相关的所有订单商品
        $query = 'select * from tbl_order_item where pk_ord_itm_ord_id = '.$order_info->pk_ord_id;
        $order_model = Order_Item::model();
//        $order_item_info = $order_model->findAllBySql($query);

        if(isset($order_info)) {
            if ($ordItmID != 'FFFFFFFF'){
                $order_item = $order_model->findByPk($ordItmID);
                if(isset($order_item)){
                    $aptm_model = Aptm::model();
                    $query_aptm = 'select * from tbl_appointment where aptm_ord_item_id = '.$ordItmID;
                    $aptm_info = $aptm_model->findAllBySql($query_aptm);
                    foreach ($aptm_info as $_v) {
                        $_v->delete();
                    }
                    $order_item->delete();
                }
            }
            else if (isset($_POST["Order"])) {
                $order_info->attributes = $_POST["Order"];

                //订单更新时间更新
                $order_info->ord_upt_time = date("Y-m-d H:i:s", time());

                //订单收货信息更新
                //如果用户没有设置订单收货信息（姓名地址邮编电话），则从customer表中查询信息
//                $cust_model = Customer::model();
//                $cust_info = $cust_model->findByPk($order_model->ord_cust_id);
//                if(isset($cust_info)) {
//                    if($order_info->ord_cust_name == '') {
//                        $order_info->ord_cust_name = $cust_info->cust_realname;
//                    }
//                    if($order_info->ord_cust_tel == '') {
//                        $order_info->ord_cust_tel = $cust_info->cust_mobile1;
//                    }
//                }

                if($order_info->save()){
                    $this->redirect("./index.php?r=order/detail&id=$id");
                }
                else {
                    //var_dump($user_info->getErrors());
                    //var_dump($customer_info->getErrors());
                    echo "<script>alert('订单信息修改失败！');</script>";
                }
            }
            $order_item_info = $order_model->findAllBySql($query);
            $this->renderPartial('Update', array("order_info" => $order_info, 'order_item_info'=>$order_item_info));
        }
        else{
            echo "<script>alert('未找到该订单！');</script>";
        }
    }
}