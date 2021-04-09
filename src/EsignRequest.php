<?php

namespace really4you\E\Sign;

use really4you\E\Sign\Helper\HttpHelper;
use ReflectionClass;
use really4you\E\Sign\Traits\HasHttpRequest;

abstract class EsignRequest
{
    use HasHttpRequest;

    private $reqType;
    private $url;
    private $baseUri = "https://smlopenapi.esign.cn";

    public function handle()
    {
        try {
            $reflectionClass = new ReflectionClass($this);
        } catch (\ReflectionException $e) {
            //throw  new HttpException('ReflectionClass fail:'.$e->getMessage());
        }

        $build = $reflectionClass->getMethod("build");
        $build->invoke($this);
        $paramStr = json_encode($this,JSON_UNESCAPED_SLASHES);
        if($paramStr=="[]"){
            $paramStr='{}';
        }

//        var_dump($this->url);var_dump($paramStr);exit;
//        $headers =  UtilHelper::buildHeaders($this->reqType,$this->url,$paramStr);
//        $param = json_decode($paramStr,true);
//        $param['headers'] = $headers;
//        return $this->request($this->reqType,$this->url,$param);

        return HttpHelper::request($this->reqType,$this->url,$paramStr ,$baseUri = $this->baseUri);
    }

    public function getReqType()
    {
        return $this->reqType;
    }

    public function setReqType($reqType)
    {
        $this->reqType = $reqType;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getBaseUri()
    {
        return $this->baseUri;
    }

    public function setBaseUri($url)
    {
        $this->baseUri = $url;
    }

    abstract function build();
}