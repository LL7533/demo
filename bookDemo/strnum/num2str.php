<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/6/24
 * Time: 上午11:18
 */
$num = new NumAndStr();
$n = '十万零一兆零一千亿零三十四万五千六百七十八';
$n = '一亿一百零九万零八百零一';
echo $num->strToNum($n)."\n";
exit;
class NumAndStr
{
    /**
     * 数组转汉子字符串
     * @param $num
     * @return string
     */
    function numToZhStr($num){
        $num = intval($num);
        $arrStr = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
        $arrNumStr = ['', '十', '百', '千', '万', '十', '百', '千', '亿', '十', '百', '千', '万','兆','十', '百', '千', '万', '十', '百', '千', '亿'];
        $len = strlen($num);
        $str ='';
        $arrNum =str_split($num, 1);
        foreach($arrNum as $i=>$v) {
            if(empty($v)){
                if(in_array(($len - $i -1),['4','8','13'])){
                    $str .= $arrNumStr[$len - $i -1];
                }elseif(!empty($arrNum[$i+1])){
                    $str .= $arrStr[$v];
                }
            }else
                $str .= $arrStr[$v] . $arrNumStr[$len-$i-1];
        }
        return $str;
    }

    /**
     * @param $str
     */
    function strToNum($str)
    {
        $strReplace = ['两'=>'二','壹'=>'一','贰'=>'二','叁'=>'三','肆'=>'四','伍'=>'五','陆'=>'六','柒'=>'七','捌'=>'八','玖'=>'九','拾'=>'十','佰'=>'百','仟'=>'千','萬'=>'万','億'=>'亿'];
        $str2Num = ['一'=>1, '二'=>2, '三'=>3, '四'=>4, '五'=>5, '六'=>6, '七'=>7, '八'=>8, '九'=>9,'零'=>'',];
        $str = str_replace(array_keys($strReplace),array_values($strReplace),$str);
        $str = str_replace(array_keys($str2Num),array_values($str2Num),$str);
        $arrStrNum =['兆'=>10000000000000000,'亿'=>100000000,'万'=>10000,'千'=>1000,'百'=>100,'十'=>10,];
        return $this->_getNum($str,1,$arrStrNum);
    }

    private function _getNum($str,$max,$baseArrayNum)
    {
        $num = 0;
        if(isset($baseArrayNum[$str])){
            $num += $baseArrayNum[$str] * $max;
        }else{
            foreach($baseArrayNum as $k=>$v){
                $arrStr =explode($k,$str);
                if(count($arrStr) == 2){
                    if(empty($arrStr[0])){
                        $num += $v * $max;
                    }elseif(is_numeric($arrStr[0])){
                        $num += $arrStr[0] * $v * $max;
                    }elseif(isset($baseArrayNum[$arrStr[0]])){
                        $num += $baseArrayNum[$arrStr[0]] * $max * $v;
                    }else{
                        $num += $this->_getNum($arrStr[0],$max*$v,$baseArrayNum);
                    }
                    if(is_numeric($arrStr[1])){
                        $num += $arrStr[1]* $max;
                        break;//是数字则跳出
                    }elseif(isset($baseArrayNum[$arrStr[1]])){
                        $num += $baseArrayNum[$arrStr[1]] * $max;
                        break;//已存在则跳出
                    }elseif(empty($arrStr[1])){
                        break;//为空跳出
                    }else{
                        $num += $this->_getNum($arrStr[1],$max,$baseArrayNum);
                    }
                    if(empty($arrStr[0]) || is_numeric($arrStr[0]) || isset($baseArrayNum[$arrStr[0]])){
                        break;//清理不必要的循环，因为已经判断过了
                    }
                }
            }
        }
        return $num;
    }
}