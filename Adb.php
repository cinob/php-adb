<?php

class Adb
{
    /**
     * HOME键
     * @var integer
     */
    public static $HOME            = 3;
    /**
     * 返回键
     * @var integer
     */
    public static $BACK            = 4;
    /**
     * 打开拨号应用
     * @var integer
     */
    public static $CALL            = 5;
    /**
     * 挂断电话
     * @var integer
     */
    public static $ENDCALL         = 6;
    /**
     * 增加音量
     * @var integer
     */
    public static $VOLUME_UP       = 24;
    /**
     * 降低音量
     * @var integer
     */
    public static $VOLUME_DOWN     = 25;
    /**
     * 电源键
     * @var integer
     */
    public static $POWER           = 26;
    /**
     * 拍照（需要在相机应用里）
     * @var integer
     */
    public static $CAMERA          = 27;
    /**
     * 打开浏览器
     * @var integer
     */
    public static $EXPLORER        = 64;
    /**
     * 菜单键
     * @var integer
     */
    public static $MENU            = 82;
    /**
     * 播放 / 暂停
     * @var integer
     */
    public static $MEDIA_PLAY_PAUSE= 85;
    /**
     * 停止播放
     * @var integer
     */
    public static $MEDIA_STOP      = 86;
    /**
     * 播放下一首
     * @var integer
     */
    public static $MEDIA_NEXT      = 87;
    /**
     * 播放上一首
     * @var integer
     */
    public static $MEDIA_PREVIOUS  = 88;
    /**
     * 移动光标到行首或列表顶部
     * @var integer
     */
    public static $MOVE_HOME       = 122;
    /**
     * 移动光标到行末或列表底部
     * @var integer
     */
    public static $MOVE_END        = 123;
    /**
     * 恢复播放
     * @var integer
     */
    public static $MEDIA_PLAY      = 126;
    /**
     * 暂停播放
     * @var integer
     */
    public static $MEDIA_PAUSE     = 127;

    /**
     * 截屏
     * @author   cinob
     * @dateTime 2020-04-04
     * @param    string     $name 图片名称
     */
    public static function getScreenShot(string $name = 'screen')
    {
        exec('adb shell screencap -p /sdcard/screen.png');
        exec('adb pull /sdcard/screen.png ./'.$name.'.png');
    }

    /**
     * 点击屏幕
     * @author   cinob
     * @dateTime 2020-04-04
     * @param    int        $x x坐标
     * @param    int        $y y坐标
     */
    public static function click(int $x, int $y)
    {
        exec("adb shell input tap $x $y");
    }

    /**
     * 滑动屏幕
     * @author   cinob
     * @dateTime 2020-04-04
     * @param    int         $x1   开始x坐标
     * @param    int         $y1   开始y坐标
     * @param    int         $x2   结束x坐标
     * @param    int         $y2   结束y坐标
     * @param    int|integer $time 滑动时间
     */
    public static function slide(int $x1, int $y1, int $x2, int $y2, int $time = 100)
    {
        exec("adb shell input swipe $x1 $y1 $x2 $y2 $time");
    }

    /**
     * 屏幕左滑动
     * @author   cinob
     * @dateTime 2020-04-04
     */
    public static function leftSlide()
    {
        self::slide(900, 1000, 200, 1000);
    }

    /**
     * 屏幕右滑动
     * @author   cinob
     * @dateTime 2020-04-04
     */
    public static function rightSlide()
    {
        self::slide(200, 1000, 900, 1000);
    }

    /**
     * 事件
     * @author   cinob
     * @dateTime 2020-04-04
     * @param    int        $key
     */
    public static function keyEvent(int $key)
    {
        exec('adb shell input keyevent '.$key);
    }

}
