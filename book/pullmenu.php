<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 16/7/2
 * Time: 下午10:55
 */
class pullmenu extends base{

    /**
     * 拉取每个影片的菜单，并且放入队列
     * @param int $start
     * @param int $end
     * @param int $n
     */
    public function pullmenus($start=0,$end=0,$n=1)
    {
        if($end < $start){
            $this->logFile('error','error start < end');
            echo 'error start < end'."\n";
            return;
        }
        $url ='http://www.biquge.la/book/';
        $arrData = [];
        for($start;$start <= $end;$start++){
            $arrData[] = [
                'bid'=>$start,
                'url'=>$url.$start.'/',
            ];
        }
        $pcnl = \vendor\PcntlTrait::instance();
        $pcnl->worker($n);
        $pcnl->pcntl_run($arrData,'pullmenu','213');
    }


    /**
     * 拉取数据，会和mysql进行对比
     * @param $arrData
     * @param $type
     */
    protected function getMenuList($arrData,$type){

    }

    protected function getBookToMysql($weher)
    {

    }
}