<?php
namespace app\index\controller;
use think\Controller;
use think\captcha\Captcha;
class Index extends Controller
{
public function selectCode()
    {
        $captcha = new Captcha(['length'=>4,'useCurve'=>false,'fontSize'=>35,'codeSet'=>'123456789']);
        return $captcha->entry();
    }
}