<?php
class export {
    var $conn;

    /***************************************************************************
     * 连接数据库
     * return：MySQL 连接标识,失败返回FALSE
     **************************************************************************/
    function export($host="localhost",$user="netpilot",$pass="123456ae",$db="uxm2") {
        if(!$this->conn=mysql_connect($host,$user,$pass)){
            die("can't connect to mysql sever:".$host);
		}
        mysql_select_db($db,$this->conn);
        mysql_query("SET NAMES UTF8;");
    }
	/***************************************************************************
     * 执行SQL查询
     * return:查询结构集 resource
     **************************************************************************/
    function execute($sql) {
        return mysql_query($sql,$this->conn);
    }
	    /***************************************************************************
     * 返回结构集中行数
     * return：number 数字
     **************************************************************************/
    function findCount($sql) {
        $result=$this->execute($sql);
        return mysql_num_rows($result);
    }

    /***************************************************************************
     * 执行SQL查询
     * return：array 数组
     **************************************************************************/
    function findBySql($sql) {
        $array=array();
        $result=mysql_query($sql);
        $i=0;
        while($row=mysql_fetch_assoc($result)) {
            $array[$i]=$row;
            $i++;
        }
        return $array;
    }
	/***************************************************************************
	 * $table:表名
	 * $mapping：数组格式头信息$map=array('No','Name','Email','Age');
	 * $fileName：Excel文件名称
	 * return：Excel格式文件
	 **************************************************************************/
	function toExcel($table,$mapping,$fileName,$sql) {
		ini_set('memory_limit','1024M');
		if (preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT'])) {
			$fileName = rawurlencode($fileName);
			$fileName = $table;
		}
		header("Expires: 0" );
		header("Pragma:public");
		header("Cache-Control:must-revalidate,post-check=0,pre-check=0" );
        header("Cache-Control:public");
		header("Content-type:application/octet-stream"); 
		//header("Content-Type:application/force-download");
		/*
		if (preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT'])) {
			header("Content-type:application/vnd.ms-excel;charset=gb2312");
		}
		else
			header("Content-type:application/vnd.ms-excel;charset=UTF-8");
		*/
		header("Content-Disposition:filename=".$fileName.".xls");
		header("Content-Type:application/download");
		header("Content-Transfer-Encoding:binary");
		
		echo'<html xmlns:o="urn:schemas-microsoft-com:office:office"
		xmlns:x="urn:schemas-microsoft-com:office:excel"
		xmlns="[url=http://www.w3.org/TR/REC-html40]http://www.w3.org/TR/REC-html40[/url]">
		<head>
		<meta http-equiv="expires" content="Mon, 06 Jan 1999 00:00:01 GMT">
		<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
		<!--[if gte mso 9]><xml>
		<x:ExcelWorkbook>
		<x:ExcelWorksheets>
		<x:ExcelWorksheet>
		<x:Name></x:Name>
		<x:WorksheetOptions>
		<x:DisplayGridlines/>
		</x:WorksheetOptions>
		</x:ExcelWorksheet>
		</x:ExcelWorksheets>
		</x:ExcelWorkbook>
		</xml><![endif]-->
		<style>table td,th{vnd.ms-excel.numberformat:@;text-align: left;} table th{color:red}</style>
		</head>
		<body link=blue vlink=purple leftmargin=0 topmargin=0>';
		echo'<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		echo'<tr>';
		if(is_array($mapping)) {
			foreach($mapping as $key=>$val){
				//$val = iconv("UTF-8","GB2312",$val);
				echo'<td style="vnd.ms-excel.numberformat:@">'.$val.'</td>';
			}
		}
		echo'</tr>';
		if( isset($sql) && strlen($sql)>0 )
			$results=$this->findBySql($sql);
		else
			$results=$this->findBySql('select * from '.$table);
		foreach($results as $result) {
			echo'<tr>';
			foreach($result as $key=>$val){
				//$val = iconv("UTF-8","GB2312",$val);
				echo'<td>'.$val.'</td>';
			}
			echo'</tr>';
		}
		echo'</table>';
		echo'</body>';
		echo'</html>';
	}
	
	function toTable($table,$mapping,$sql) {
		echo'<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		echo'<tr>';
		if(is_array($mapping)) {
			foreach($mapping as $key=>$val){
				echo'<td>'.$val.'</td>';
			}
		}
		echo'</tr>';
		if( isset($sql) && strlen($sql)>0 )
			$results=$this->findBySql($sql);
		else
			$results=$this->findBySql('select * from '.$table);
		foreach($results as $result) {
			echo'<tr>';
			foreach($result as $key=>$val){
				//$val = iconv("UTF-8","GB2312",$val);
				echo'<td>'.$val.'</td>';
			}
			echo'</tr>';
		}
		echo'</table>';
	}
		
	function Backup($table) {
		if(is_array ($table)) {
			$str="";
			foreach($table as $tab)
				$str.=$this->get_table_content($tab);
			return $str;
		}else {
			return $this->get_table_content($table);
		}
	}
	
	/***************************************************************************
	 * 备份数据库数据到文件
	 * $table：表名
	 * $file：文件名
	 **************************************************************************/
	function Backuptofile($table,$file) {
		header("Content-disposition: filename=$file.sql");//所保存的文件名
		header("Content-type: application/octetstream");
		header("Pragma: no-cache");
		header("Expires: 0");
		if(is_array ($table)) {
			$str="";
			foreach($table as $tab)
				$str.=$this->get_table_content($tab);
			echo $str;
		}else {
			echo $this->get_table_content($table);
		}
	}
}
/*  UnitTest
$file=new export(); 
//toExcel 
$map=array('id' =>'ID','name'=>'测试机名','ip'=>'IP','city'=>'城市');//表头 
$sql = "select id, name as '测试机', ip as IP, city as '城市' from testagent"; 
$file->toExcel('testagent',$map,'测试机',$sql); 
*/
?>