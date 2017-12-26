<?php
/**
 *
 */
class ResourceAction extends Action {

    //添加需求信息
    public function add() {
        $json = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = (array)json_decode($json);
        
        $data['addtime'] = time();
        
        $isok = D('Resource')->add($data);
		
        if($isok) {
            $this->ajaxReturn($isok, 'ok', 1);
        } else {
            $this->ajaxReturn('', '添加失败', 0);
        }
    }
    
   //查询需求信息
   public function search() {
       
       
        //根据经纬度计算距离SELECT id,ROUND(6378.138*2*ASIN(SQRT(POW(SIN((40.062731*PI()/180-goLat*PI()/180)/2),2)+COS(40.062731*PI()/180)*COS(goLat*PI()/180)*POW(SIN((116.311906*PI()/180-goLng*PI()/180)/2),2)))*1000) AS juli FROM pc_resource


        $json = $GLOBALS['HTTP_RAW_POST_DATA'];
        $body = (array)json_decode($json);

        $where['goDate'] = $body['goDate'];
        $page = intval($body['page']);
        $size = intval($body['size']);

        if(empty($page)) {
           $page = 0;
        }
        
        if(empty($size)) {
            $size = 10;
        }
       
        $firstRow = $page*$size;
        $listRows = $size;

        $goLng = $body['goLng']|'116.311906';
        $goLat = $body['goLat']|'40.062731';
        $toLng = $body['toLng']|'116.311906';
        $toLat = $body['toLat']|'40.062731';

        $fields = " *,ROUND(6378.138*2*ASIN(SQRT(POW(SIN(($goLat*PI()/180-goLat*PI()/180)/2),2)+COS($goLat*PI()/180)*COS(goLat*PI()/180)*POW(SIN(($goLng*PI()/180-goLng*PI()/180)/2),2)))*1000) AS gojl,ROUND(6378.138*2*ASIN(SQRT(POW(SIN(($toLat*PI()/180-toLat*PI()/180)/2),2)+COS($toLat*PI()/180)*COS(toLat*PI()/180)*POW(SIN(($toLng*PI()/180-toLng*PI()/180)/2),2)))*1000) AS tojl ";

        $list = D('Resource')->where($where)->order('gojl,tojl')->field($fields)->limit($firstRow.','.$listRows)->select();
        //echo D('Resource')->getLastSql();
        if($list) {
            $this->ajaxReturn($list, 'ok', 1);
        } else {
            $this->ajaxReturn(array(), '暂无数据', 0);
        }
   }
	
	
	
	

}