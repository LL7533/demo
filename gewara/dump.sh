#此脚本用于切换缓存后，从db中读取数据再重新生成到缓存
phpFilePath = '/Users/liulong/www/demo/gewara';
#dump.log路径
dumpLogPath='/Users/liulong/www/demo/gewara/log/dump.log'

#本机配置
phpPath='php'
#本机log路径

#-w 条件
#-s 开始
#-e 结束
#-n 多少个进程

w='cinema'
s=1
e=1000000
n=10


while getopts "w:s:e:n:" arg #选项后面的冒号表示该选项需要参数
do
        case $arg in
             w)
                echo "w's arg:$OPTARG" #参数存在$OPTARG中
                w=$OPTARG
                ;;
             s)
                echo "s's arg:$OPTARG"
                s=$OPTARG
                ;;
             e)
                e=$OPTARG
                echo "e's arg:$OPTARG"
                ;;
             n)
                n=$OPTARG
                echo "n's arg:$OPTARG"
                ;;
             ?) #当有不认识的选项的时候arg为?
            echo "unkonw argument"
        exit 1
        ;;
        esac
done

if [ "$w"x = ""x ];then
echo "[error] must input -w"
exit 1
fi

cutNumber=$[ $e / $n ]
#循环每个分片启动进程
for((i=1;i<=$[$n+1];i++));do
    endId=$[$s+$cutNumber]
    echo $endId;
    #echo $phpPath '/Users/liulong/www/demo/gewara'/saveData.php  -w $w -s $s -e $endId
    $phpPath '/Users/liulong/www/demo/gewara'/saveData.php  -w $w -s $s -e $endId &
    s=$[$s+$cutNumber]
done