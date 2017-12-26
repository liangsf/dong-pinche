<?php
/**
 * @author lsf <lsf880101@foxmail.com>
 */
class UserModel extends CommonModel {

	protected $tableName='pc_users';
	
	public function addUser($res) {
		$res = (array)$res;

		$data['city'] = $res['city'];
		$data['country'] = $res['country'];
		$data['headimg'] = $res['headimg'];
		$data['nickname'] = $res['nickname'];
		$data['openid'] = $res['openid'];
		$data['province'] = $res['province'];
		$data['sex'] = $res['sex'];
		$data['openid'] = $res['openid'];
		$data['status'] = 1;
		$data['addtime'] = time();
		
		$where['openid'] = $data['openid'];
		$rs = $this->where($where)->find();
		if($rs){
			return $rs;
		}
		$uid = $this->add($data);
		$rs['id'] = $uid;
		return $rs;
	}
 
}
