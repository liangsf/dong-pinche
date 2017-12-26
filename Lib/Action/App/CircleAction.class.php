<?php
/**
 *
 */
class CircleAction extends Action {

    //添加需求信息
    public function add() {
        $json = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = (array)json_decode($json);
        
        print_r($data);
        return false;
        
        $isok = D('Resource')->add($data);
		
        if($isok) {
            $this->ajaxReturn($isok, 'ok', 1);
        } else {
            $this->ajaxReturn('', '添加失败', 0);
        }
    }
    
   //查询需求信息
   public function search() {
       $json = $GLOBALS['HTTP_RAW_POST_DATA'];
       $where = (array)json_decode($json);
       
       $list = D('Resource')->where($where)->order($order)->field($fields)->limit($Page->firstRow.','.$Page->listRows)->select();
       //$rs = D('Resource')->get_page_data('');
       //print_r($rs);
       echo D('Resource')->getLastSql();
   }
	
	
	
	

}