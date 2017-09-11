<?php
/**
 * Created by PhpStorm.
 * User: XB
 * Date: 2017/8/25
 * Time: 9:58
 */
namespace Xbb\ShortUrl;

use Illuminate\Database\Eloquent\Model;

/**
 * Class shortUrl
 * @package Xbb\shortUrl
 */
class ShortUrl extends Model
{
    protected $table='urls';
    protected $fillable=['url','hash','count'];

    /**
     * @param $url
     * @return mixed|string
     */
    public function makeShortUrl($url)
    {
        $urlExist=self::where('url',$url)->first();
        if ($urlExist){
            return $urlExist->hash;
        }

        $shortUrl=self::create(array('url'=>$url,'hash'=>'test'));
        $shortUrl->hash=$this->from10_to62($shortUrl->id);
        $shortUrl->save();
        return $shortUrl->hash;
    }

    /**
     * @param $shortUrl
     * @return bool
     */
    public function hitUrl($shortUrlHash)
    {
        $urlId=$this->from62_to10($shortUrlHash);
        $url=self::where('id',$urlId)->first();
        if (!$url){
            return false;
        }
        $url->count++;
        $url->save();
        return $url->url;
    }

    /**
     * 十进制数转换成62进制
     *
     * @param integer $num
     * @return string
     */
    function from10_to62($num) {
        $to = 62;
        $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ret = '';
        do {
            $ret = $dict[bcmod($num, $to)] . $ret;
            $num = bcdiv($num, $to);
        } while ($num > 0);
        return $ret;
    }

    /**
     * 62进制数转换成十进制数
     *
     * @param string $num
     * @return string
     */
    function from62_to10($num) {
        $from = 62;
        $num = strval($num);
        $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $len = strlen($num);
        $dec = 0;
        for($i = 0; $i < $len; $i++) {
            $pos = strpos($dict, $num[$i]);
            $dec = bcadd(bcmul(bcpow($from, $len - $i - 1), $pos), $dec);
        }
        return $dec;
    }
}