<?php
/**

 */
class MyAction extends Action {

    public function __construct(){

		header('Access-Control-Allow-Origin:*');
		
		//获取用户信息
		$userId = $_SESSION['userid'];
		$userName = $_SESSION['name'];
		
		$this->assign('userId', $userId);
		$this->assign('userName', $userName);
    }

   
}