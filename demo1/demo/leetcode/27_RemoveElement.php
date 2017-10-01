<?php
/**
 * Created by PhpStorm.
 * User: liulong
 * Date: 17/9/16
 * Time: 22:29
 * 27. Remove Element
 * Given an array and a value, remove all instances of that value in place and return the new length.
 * Do not allocate extra space for another array, you must do this in place with constant memory.
 * The order of elements can be changed. It doesn't matter what you leave beyond the new length.
 * Example:
 * Given input array nums = [3,2,2,3], val = 3
 * our function should return length = 2, with the first two elements of nums being 2.
 * 给定数组和值，删除该值的所有实例并返回新的长度。
 * 不要为另一个数组分配额外的空间，您必须使用常量内存来执行此操作。
 * 元素的顺序可以改变。不需要考虑新的长度。
 */

/**
 C++实现方式

class Solution {
public:
int removeElement(vector<int>& nums, int val) {
if (nums.begin() == nums.end()) return 0;
vector<int>::iterator itor;
for (itor = nums.begin(); itor + 1 != nums.end(); )
{
if (*(itor + 1) == val) {
nums.erase(itor + 1);
}
else {
itor++;
}
}
itor = nums.begin();
if (*itor == val) {
nums.erase(itor);
return nums.size();
}
return nums.size();
}
};

 */
$array = [3,2,2,3];
$val = 3;

/**
 * 替换 、删除法
 * @param $array
 * @param $val
 * @return int
 */
function remove_Element($array,$val)
{
    $k=0;
    for($i=0;$i<count($array);$i++){
        if ($array[$i] != $val){
            $array[$k++]=$val;
        }
    }
    for ($i=count($array)-1;$i>=$k;$i--){
        unset($array[$i]);
    }
    return count($array);
}
print_r(remove_Element($array,$val));