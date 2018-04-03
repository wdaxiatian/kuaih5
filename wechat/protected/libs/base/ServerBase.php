<?php


class ServerBase extends CComponent{
	
		//组合字段
	public static function comParams($params=array(),$condition='and',$nub="-4"){ 
		$param = '';
		foreach($params as $k=>$v){
			
			$param .="$k='$v' $condition "; 
		}
		$param =substr($param,0,$nub); 

		return $param;
	}
	
}