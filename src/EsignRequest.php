<?php

namespace really4you\E\Sign;

use really4you\E\Sign\Helper\HttpHelper;
use really4you\E\Sign\Helper\UtilHelper;
use ReflectionClass;
use really4you\E\Sign\Traits\HasHttpRequest;

abstract class EsignRequest
{
    use HasHttpRequest;

    private $reqType;
    private $url;

    public function handle()
    {
        try {
            $reflectionClass = new ReflectionClass($this);
        } catch (\ReflectionException $e) {
        }

        $build = $reflectionClass->getMethod("build");
        $build->invoke($this);
        $paramStr = json_encode($this,JSON_UNESCAPED_SLASHES);
        if($paramStr=="[]"){
            $paramStr='{}';
        }

        try {
            // set headers
            $headers =  UtilHelper::buildHeaders($this->reqType,$this->url,$paramStr) ;
            $param = json_decode($paramStr,true);

            return $this->eSignRequest($this->reqType,Esign::getBaseUri().$this->url,$param,$headers);

        } catch (\Throwable $e) {
            return json_encode($e->getMessage());
        }

        // curl request
        //return HttpHelper::request($this->reqType,$this->url,$paramStr ,$baseUri = Esign::getBaseUri());
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
        return Esign::getBaseUri();
    }

    public function setBaseUri($url)
    {
        return Esign::setBaseUri($url);
    }

    abstract function build();
}