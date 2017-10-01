<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/7/9
 * Time: 下午1:29
 */

class book extends  base{
    public function getBookToList($n=1,$w='')
    {
        $url ='http://www.biquge.la/book/';
        for($i=1;$i<=$w;$i++){
            $arrData = ['bid'=>$i,'url'=>$url.$i.'/','type'=>'book_name'];
        }
    }
}