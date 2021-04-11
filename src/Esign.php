<?php

namespace really4you\E\Sign;

class Esign
{
    private static $project_id;
    private static $project_scert;
    private static $base_uri = 'https://smlopenapi.esign.cn';

    //设置代理
    private static $ENABLE_HTTP_PROXY;//是否代理
    private static $HTTP_PROXY_IP;//ip
    private static $HTTP_PROXY_PORT;//网关

    public static function init($project_id,$project_scert)
    {
        self::$project_id = $project_id;
        self::$project_scert = $project_scert;
    }

    public static function getProjectId()
    {
        return self::$project_id;
    }

    public static function setProjectId($project_id)
    {
        self::$project_id = $project_id;
    }

    public static function getProjectScert()
    {
        return self::$project_scert;
    }

    public static function setProjectScert($project_scert)
    {
        self::$project_scert = $project_scert;
    }

    public static function getBaseUri()
    {
        return self::$base_uri;
    }

    public static function setBaseUri($uri)
    {
        return self::$base_uri = $uri;
    }

    public static function getENABLEHTTPPROXY()
    {
        return self::$ENABLE_HTTP_PROXY;
    }

    public static function setENABLEHTTPPROXY($ENABLE_HTTP_PROXY)
    {
        self::$ENABLE_HTTP_PROXY = $ENABLE_HTTP_PROXY;
    }

    public static function getHTTPPROXYIP()
    {
        return self::$HTTP_PROXY_IP;
    }

    public static function setHTTPPROXYIP($HTTP_PROXY_IP)
    {
        self::$HTTP_PROXY_IP = $HTTP_PROXY_IP;
    }

    public static function getHTTPPROXYPORT()
    {
        return self::$HTTP_PROXY_PORT;
    }

    public static function setHTTPPROXYPORT($HTTP_PROXY_PORT)
    {
        self::$HTTP_PROXY_PORT = $HTTP_PROXY_PORT;
    }
}