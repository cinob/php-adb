<?php
// 引入php-adb类
require '../Adb.php';

// 调用截图方法
//Adb::getScreenShot();

// 逛一逛
function go(int $x, int $y)
{
    // 点击逛一逛按钮
    Adb::click($x, $y);
    // 模拟加载页面耗时 根据手机网速自行调整
    sleep(1);
    // 模拟浏览页面15s
    for ($i=0; $i<5; $i++) {
        Adb::slide(528, 1964,502, 862, 3000);
        sleep(1);
    }
    // 返回喵币中心页面
    Adb::keyEvent(Adb::$BACK);
    sleep(1);
}

// 完成15次
for ($i=0;$i<11;$i++) {
    go(893, 1187);
}
go(896, 1390);
go(900, 1582);
go(894, 1763);
go(909, 1947);
