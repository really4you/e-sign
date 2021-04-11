<?php

namespace really4you\E\Sign\Helper;

class HttpHelper
{
    /**
     * 发送请求
     *
     * @param $reqType
     * @param $url
     * @param $paramStr
     * @param $baseUri
     * @return response\EsignResponse
     */
    public static function request($reqType, $url, $paramStr, $baseUri)
    {
		if(strtoupper($reqType) == "GET" || strtoupper($reqType) == "DELETE"){
            $paramStr = null;
        }

		//对body体做md5摘要
        $contentMd5    = UtilHelper::getContentMd5($paramStr);
		//传入生成的bodyMd5,加上其他请求头部信息拼接成字符串,整体做sha256签名
        $reqSignature = UtilHelper::getSignature($reqType,"*/*","application/json; charset=UTF-8",$contentMd5,
            "","",$url);
        //var_dump($reqSignature);exit;
        $url = $baseUri.$url;

		return HttpCfgHelper::sendHttp($reqType, $url, UtilHelper::buildCommHeader($contentMd5,$reqSignature),$paramStr);
    }

    /**
     * 文件上传
     *
     * @param $uploadUrls
     * @param $filePath
     * @param $ContenType
     * @return response\EsignResponse
     */
    public static function upLoadFileHttp($uploadUrls,$filePath,$ContenType)
    {
        $fileContent = file_get_contents($filePath);
        $contentBase64Md5 = UtilHelper::getContentBase64Md5($filePath);
        return HttpCfgHelper::upLoadFileHttp($uploadUrls, $contentBase64Md5, $fileContent,$ContenType);
    }


}