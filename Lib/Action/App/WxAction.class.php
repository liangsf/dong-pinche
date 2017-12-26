<?php
/**
 *微信js-sdk
 */
class WxAction extends MyAction {
	
	//获取js-sdk基本信息
	public function getConfig() {
		//require_once "jssdk.php";
		//$jssdk = new JSSDK("wxbc58241a7df09425", "385f62d749433e2b2265bc4e30ec3683");
		//$signPackage = $jssdk->GetSignPackage();

		import("quanduoduo.Action.JssdkAction");
		$jssdk = new JssdkAction(C('WX_AppID'), C('WX_AppSecret'));
		$signPackage = $jssdk->GetSignPackage();
		$this->ajaxReturn($signPackage, 'ok', '1');
		/*
		Array
		(
			[appId] => wxbc58241a7df09425
			[nonceStr] => aFknc73uZAfz1IWN
			[timestamp] => 1499398976
			[url] => http://127.0.0.22/index.php/App/wx/getConfig
			[signature] => a7c467812f81052f6395890deb0cf920aa5b04c8
			[rawString] => jsapi_ticket=HoagFKDcsGMVCIY2vOjf9qgZwUlyh36h4lBaoUpDtBQqNxyKYu4xdLtFRNy7y7L6FgelUZp-YLQBR4CcCMQY7Q&noncestr=aFknc73uZAfz1IWN&timestamp=1499398976&url=http://127.0.0.22/index.php/App/wx/getConfig
		)

		*/
	}
	
	//通过code获取用户基本信息
	public function getOpenInfo() {
		$code = $_GET['code'];
        
        if(empty($code)) {
            $this->ajaxReturn('', 'code is empty', 0);
        }
		
		import("quanduoduo.Action.JssdkAction");
		$jssdk = new JssdkAction(C('WX_AppID'), C('WX_AppSecret'));
		$rs = $jssdk->getOpenInfo($code);
		//添加用户数据
		//$res = D('User')->addUser($rs);
		//$rs->id = $res['id'];
		//添加用户数据
		$this->ajaxReturn($rs, 'ok', '1');
	}

}