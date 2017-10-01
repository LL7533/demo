<?php
//$str = "`recordid` int(11) NOT NULL COMMENT '评论id',
//  `memberid` int(11) unsigned NOT NULL COMMENT '用户id',
//  `tag` varchar(255) DEFAULT NULL COMMENT '模块 影人：star  影院：cinema  演出：drama  电影：movie  活动：activity',
//  `relatedid` int(8) NOT NULL COMMENT '关联的对象（对应的id）',
//  `flowernum` int(9) DEFAULT '0' COMMENT '用户点赞数+匿名用户点赞数',
//  `addtime` varchar(128) DEFAULT NULL COMMENT '操作时间',
//  `status` varchar(255) DEFAULT NULL COMMENT '帖子状态Y_NEW-正常显示哇啦；   N_APPROVAL-待审核；   N_DELETE-被删除',
//  `flag` varchar(255) NOT NULL DEFAULT '',
//  `transferid` int(11) NOT NULL COMMENT '转载id',
//  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '发表来源',
//  `replycount` int(11) NOT NULL DEFAULT '0' COMMENT '回复数',
//  `transfercount` int(11) NOT NULL DEFAULT '0' COMMENT '收藏数',
//  `replytime` int(11) DEFAULT NULL COMMENT '最后回复时间',
//  `sorttime` int(11) DEFAULT NULL,
//  `topic` varchar(200) NOT NULL DEFAULT '' COMMENT 'WALA主题电影的名称',
//  `body` text NOT NULL COMMENT '哇啦内容',
//  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称（用户的昵称）',
//  `generalmark` int(11) NOT NULL COMMENT '评分1-10',
//  `otherinfo` varchar(5000) NOT NULL DEFAULT '' COMMENT 'json 影片相关',
//  `apptype` varchar(10) NOT NULL DEFAULT '' COMMENT '数据来源如 app、web等来源',
//  `picturename` varchar(5000) NOT NULL DEFAULT '' COMMENT '图片,多张,逗号隔开',
//  `link` varchar(500) NOT NULL DEFAULT '' COMMENT 'html 标签，一个',
//  `pointx` varchar(50) NOT NULL DEFAULT '',
//  `pointy` varchar(50) NOT NULL DEFAULT '',
//  `ip` varchar(30) NOT NULL DEFAULT '' COMMENT '用户 ip',
//  `body_length` int(4) NOT NULL COMMENT '发布哇啦的内容长度',
//  `suspected_ad` varchar(10) NOT NULL DEFAULT '' COMMENT '是否疑似广告wala，这类哇啦排除在热门哇啦外',
//  `admin_recommend` int(10) NOT NULL,
//  `order_time` int(8) DEFAULT NULL COMMENT '订单时间',
//  `recommend_top` int(4) NOT NULL COMMENT '推荐排序',
//  `flowernum_member` varchar(200) NOT NULL DEFAULT '' COMMENT '赞同的前10位用户逗号隔开',
//  `isqa` varchar(128) NOT NULL DEFAULT '',
//  `title` varchar(500) NOT NULL DEFAULT '' COMMENT '标题',
//  `videopath` varchar(500) NOT NULL DEFAULT '' COMMENT '视频路径 链接 url',
//  `mtids` varchar(500) NOT NULL DEFAULT '' COMMENT '数字，不确定使用方式，逗号隔开',
//  `moderatorid` int(8) NOT NULL COMMENT '话题id',
//  `basicweight` int(4) NOT NULL DEFAULT '0' COMMENT '基础权重排序使用',
//  `timeweight` int(8) NOT NULL DEFAULT '1' COMMENT '时间权重',
//  `type` varchar(128) NOT NULL DEFAULT '' COMMENT '哇啦类型	  问答：qa  话题：debate  剧透：spoiler',
//  `htmltext` varchar(128) NOT NULL DEFAULT '',
//  `effect` varchar(128) NOT NULL DEFAULT '',
//  `changeweight` float NOT NULL COMMENT '社区可变权重',
//  `moviechangeweight` float NOT NULL COMMENT '影片维度权重',
//  `bodyweight` float NOT NULL COMMENT '主体权重值',
//  `validflowernum` int(4) NOT NULL COMMENT '不确定使用方式',
//  `biglabelids` varchar(200) NOT NULL DEFAULT '',
//  `anonymousflowernum` int(4) DEFAULT '0' COMMENT '匿名用户点赞数',
//  `share_title` varchar(50) NOT NULL DEFAULT '',
//  `recomment_wala` int(4) DEFAULT NULL,";

//$strUp = 'recordid,memberid,tag,relatedid,flowernum,addtime,status,flag,transferid,address,replycount,transfercount,replytime,sorttime,topic,body,nickname,generalmark,otherinfo,apptype,picturename,link,pointx,pointy,ip,suspected_ad,body_length,order_time,recommend_top,flowernum_member,isqa,title,videopath,mtids,moderatorid,basicweight,timeweight,type,htmltext,effect,changeweight,moviechangeweight,bodyweight,validflowernum,biglabelids,anonymousflowernum,recomment_wala';

//comment body
$str = "`_id` int(10) unsigned NOT NULL COMMENT '哇啦表id',
  `body` text NOT NULL COMMENT '哇啦内容',
  `updatetime` varchar(128) NOT NULL DEFAULT '' COMMENT '最后修改时间',
  `bodyxml` text COMMENT '哇啦内容xml（已废弃）',
  `bodyT` text COMMENT '哇啦内容xml（已废弃）',
  `bodyxmlT` text COMMENT '哇啦内容xml（已废弃）',
  `bodyjson` text NOT NULL COMMENT '加样式的哇啦内容',";
$strUp ='_id,body,updatetime,bodyxml,bodyT,bodyxmlT,bodyjson';

//flower_member
$str = "`ckey` varchar(256) DEFAULT NULL COMMENT 'memberid+type+relatedid',
  `memberid` bigint(20) DEFAULT NULL COMMENT ' 用户id',
  `type` varchar(256) NOT NULL,
  `relatedid` bigint(20) DEFAULT NULL COMMENT '关联的对象（对应的id）',
  `addtime` varchar(128) DEFAULT NULL COMMENT '添加时间\n添加时间\n添加时间\n',
  `source` varchar(128) DEFAULT NULL COMMENT '来源web,wap，pc\n',
  `parentid` varchar(256) DEFAULT NULL,
  `parenttype` varchar(256) DEFAULT NULL,";
$strUp ='ckey,memberid,type,relatedid,addtime,source,parentid,parenttype';

//recomment
$str = "`recordid` bigint(20) DEFAULT NULL COMMENT '格瓦拉的id',
  `memberid` bigint(20) DEFAULT NULL COMMENT '发表人id',
  `relatedid` bigint(20) DEFAULT NULL COMMENT '关联的对象（对应的id）',
  `tomemberid` bigint(20) DEFAULT NULL COMMENT '对哪个用户回复的	',
  `body` text COMMENT '回复内',
  `addtime` varchar(128) DEFAULT NULL COMMENT '添加时',
  `status` varchar(128) DEFAULT NULL COMMENT ' 状态	',
  `address` varchar(128) DEFAULT NULL COMMENT ' 发表来源',
  `isread` bigint(20) DEFAULT NULL COMMENT '不确定	',
  `tag` varchar(128) DEFAULT NULL COMMENT ' 影人：starvity',
  `transferid` bigint(20) DEFAULT NULL COMMENT '不确定',
  `toread` bigint(20) DEFAULT NULL COMMENT '不确定',
  `totop` bigint(20) DEFAULT NULL COMMENT '不确定',
  `imgpath` varchar(5000) DEFAULT NULL COMMENT ' 存放',
  `flowernum` bigint(20) DEFAULT NULL COMMENT '用户点赞数+匿名用户',
  `mtid` bigint(20) DEFAULT NULL COMMENT '标签id 未知',
  `atmemberjson` varchar(500) DEFAULT NULL COMMENT ' 不确定	',
  `replyids` varchar(1000) DEFAULT NULL COMMENT ' 回复回复的id  ',
  `ip` varchar(20) DEFAULT NULL COMMENT ' 回复用户IP',
  `anonymousflowernum` bigint(20) DEFAULT '0' COMMENT '匿名用',
  `lastreplyid` bigint(20) DEFAULT NULL COMMENT '最后的',";
$strUp ='recordid,memberid,relatedid,tomemberid,body,addtime,status,address,isread,tag,transferid,toread,totop,imgpath,flowernum,mtid,atmemberjson,replyids,ip,anonymousflowernum,lastreplyid';

$arr = explode("\n",$str);
$arrData = [];
foreach ($arr as $val) {
    $val = explode('`', $val);
    if(!empty($val[1]))
    $arrData[] = $val[1];
//    echo "'" . $val . "' =>" . '$this->getRequestParams' . "('" . $val . "',''),\n";
}

echo "mysql中不存在与线上表 \n";
$strUp = explode(',',$strUp);
foreach ($arrData as $val){
    if(!in_array($val,$strUp)){
        echo  $val."\n";
    }
}
echo "线上表不存在于mysql中 \n";
foreach ($strUp as $val){
    if(!in_array($val,$arrData)){
        echo  $val."\n";
    }
}
exit;


//$str =
//    "`id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键自增',
//  `recordid` bigint(20) DEFAULT NULL COMMENT '格瓦拉的id',
//  `memberid` bigint(20) DEFAULT NULL COMMENT '发表人id',
//  `relatedid` bigint(20) DEFAULT NULL COMMENT '关联的对象（对应的id）',
//  `tomemberid` bigint(20) DEFAULT NULL COMMENT '对哪个用户回复的	',
//  `body` text COMMENT '回复内',
//  `addtime` varchar(128) DEFAULT NULL COMMENT '添',
//  `status` varchar(128) DEFAULT NULL COMMENT ' 状态	',
//  `address` varchar(128) DEFAULT NULL COMMENT ' 发表来源',
//  `isread` bigint(20) DEFAULT NULL COMMENT '不确定	',
//  `tag` varchar(128) DEFAULT NULL COMMENT ' 影人：：activity',
//  `transferid` bigint(20) DEFAULT NULL COMMENT '不确定',
//  `toread` bigint(20) DEFAULT NULL COMMENT '不确定',
//  `totop` bigint(20) DEFAULT NULL COMMENT '不确定',
//  `imgpath` varchar(5000) DEFAULT NULL COMMENT ' 存放图片',
//  `flowernum` bigint(20) DEFAULT NULL COMMENT '用户点赞数+匿名用户点赞',
//  `mtid` bigint(20) DEFAULT NULL COMMENT '标签id 未知',
//  `atmemberjson` varchar(500) DEFAULT NULL COMMENT ' 不确定	',
//  `replyids` varchar(1000) DEFAULT NULL COMMENT ' 回复回复的id  ',
//  `ip` varchar(20) DEFAULT NULL COMMENT ' 回复用户I',
//  `anonymousflowernum` bigint(20) DEFAULT '0' COMMENT '匿名用户点',
//  `lastreplyid` bigint(20) DEFAULT NULL COMMENT '最后的',";

$arr = explode("\n",$str);
foreach ($arr as $val)
{
    $val = explode('`',$val);
    $val = $val[1];
    echo  "'".$val."' =>".'$this->getRequestParams'."('".$val."',''),\n";
}