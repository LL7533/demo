<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/8/28
 * Time: 16:21
 */
function my_scandir($dir)
{
    $files=array();
    if(is_dir($dir))
    {
        if($handle=opendir($dir))
        {
            while(($file=readdir($handle))!==false)
            {
                if($file!="."&& $file!="..")
                {
                    if(is_dir($dir."/".$file))
                    {
                        $files[$file]=my_scandir($dir."/".$file);
                    }
                    else
                    {
                        $files[]=$dir."/".$file;
                    }
                }
            }
            closedir($handle);
            return $files;
        }
    }
}
echo "\n";
print_r(my_scandir("/data"));