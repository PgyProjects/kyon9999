<?php

namespace App\Http\Controllers;

use App\commend;
use App\customer;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Storage;
class CommendController extends Controller
{
    protected $url;

    /**
     * 根据用户ID, 生成推荐URI, 并生成推荐二维码, 转换为base64格式字符串,
     * @param $id
     * @return string
     */
    private function doMake($id)
    {
        $this->url = md5("?id=".$id);
        $url = 'http://test.pgyxwd.com/commend'.$this->url;
        $QRimg = QrCode::format('png')->size(516)->margin(10)->errorCorrection('H')
            ->generate($url);
        return array('url'=>$url, 'QRimg' => base64_encode($QRimg));
    }

    public function commend(Request $request)
    {

    }
}