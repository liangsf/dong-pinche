<?php
/**
 *
 */
class UserAction extends Action {

    // 添加用户
    public function add() {
        $json = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = (array)json_decode($json);
        
		$data['nickname'] = strval($data['nickName']);
		$data['openid'] = strval($data['openid']);
		$data['city'] = strval($data['city']);
		$data['province'] = strval($data['province']);
		$data['country'] = strval($data['country']);
		$data['headimg'] = strval($data['avatarUrl']);
		$data['sex'] = strval($data['gender']);
        
        $res = D('User')->addUser($data);
		$rs->id = $res['id'];
        if($rs->id) {
            $this->ajaxReturn($rs, 'ok', 1);
        } else {
            $this->ajaxReturn('', '添加失败', 0);
        }
    }
    
    //获取用户基本信息
    public function findUserInfo() {
        $openid = strval($_GET['openid']);
        if(empty($openid)) {
            $this->ajaxReturn('', 'openid is empty', 0);
        }
        $where['openid'] = $openid;
        $rs = D('User')->find($where);
        $this->ajaxReturn($rs, 'ok', 1);
    }
	
	
	
	

}