<?php

namespace really4you\E\Sign\Helper;

use really4you\E\Sign\Esign;

class UtilHelper
{

    /**
     * set headers
     *
     * @param $reqType
     * @param $url
     * @param $paramStr
     * @return array
     */
    public static function buildHeaders($reqType, $url, $paramStr)
    {
        $contentMd5    = self::getContentMd5($paramStr);
        $reqSignature = self::getSignature($reqType,"*/*","application/json; charset=UTF-8",$contentMd5,
            "","",$url);

        return self::setGuzzleHeaders($contentMd5,$reqSignature);
    }

    public static function setGuzzleHeaders($contentMD5,$reqSignature)
    {
        return [
         'X-Tsign-Open-App-Id'=>Esign::getProjectId(),
         'X-Tsign-Open-Ca-Timestamp'=>self::getMillisecond(),
         'Accept'=>'*/*',
         'X-Tsign-Open-Ca-Signature'=>$reqSignature,
         'Content-MD5'=>$contentMD5,
         'Content-Type'=>'application/json; charset=UTF-8',
         'X-Tsign-Open-Auth-Mode'=>'Signature'
        ];
    }


    /**
     * 构造头部信息
     *
     * @param $contentMD5
     * @param $reqSignature
     * @return array
     */
    public static function buildCommHeader($contentMD5,$reqSignature)
    {
        $headers = array(
            'X-Tsign-Open-App-Id:'.Esign::getProjectId(),
            'X-Tsign-Open-Ca-Timestamp:'.self::getMillisecond(),
            'Accept:*/*',
            'X-Tsign-Open-Ca-Signature:'.$reqSignature,
            'Content-MD5:'.$contentMD5,
            'Content-Type:application/json; charset=UTF-8',
            'X-Tsign-Open-Auth-Mode:Signature'
        );

        return $headers;
    }

    /**
     * 获取MD5
     * @param $bodyData
     * @return string
     */
    public static function getContentMd5($bodyData)
    {
        return  base64_encode(md5($bodyData,true));
    }

    /**
     * 生成签名
     *
     * @param $httpMethod
     * @param $accept
     * @param $contentType
     * @param $contentMd5
     * @param $date
     * @param $headers
     * @param $url
     * @return string
     */
    public static function getSignature($httpMethod,$accept,$contentType,$contentMd5,$date,$headers,$url)
    {
        $stringToSign = $httpMethod . "\n" . $accept . "\n"  . $contentMd5 . "\n" . $contentType . "\n"  . $date . "\n" .$headers  ;
        if($headers != ''){
            $stringToSign .= "\n".$url;
        }else{
            $stringToSign .= $url;
        }
        $signature = hash_hmac("sha256",utf8_encode($stringToSign), utf8_encode(Esign::getProjectScert()), true);
        $signature = base64_encode($signature);
        return $signature;
    }


    /**
     * 判断是网络路径还是文件路径
     *
     * @param $url
     * @return bool
     */
    public static function isUrl($url)
    {
        $parse = parse_url($url);
        $scheme = $parse['scheme'];
        $scheme = strtolower($scheme);

        if("http" == $scheme){
            return true;
        }

        if("https" == $scheme){
            return true;
        }

        return false;
    }

    /**
     * 生成13位时间戳
     *
     * @return float
     */
    public static function getMillisecond()
    {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }

    public static function jsonSer($obj)
    {
        $json = array();
        foreach ($obj as $key => $value) {
            if($value==null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }

    /**
     * 获取文件的Content-MD5原理：1.先计算MD5加密的二进制数组（128位）2.再对这个二进制进行base64编码（而不是对32位字符串编码）
     *
     * @param $filePath
     * @return string
     */
    public static function getContentBase64Md5($filePath)
    {
        //获取文件MD5的128位二进制数组
        $md5file = md5_file($filePath,true);
        //计算文件的Content-MD5
        $contentBase64Md5 = base64_encode($md5file);
        return $contentBase64Md5;
    }
}