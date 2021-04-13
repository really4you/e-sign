<?php

namespace really4you\E\Sign\Services\FileTemplate;

use really4you\E\Sign\Helper\HttpHelper;

/**
 * 文件流上传
 *
 * Class UploadFile
 * @package factory\filetemplate
 */
class UploadFile
{
    private $filePath;
    private $contentType;
    private $url;

    /**
     * UploadFile constructor.
     * @param $filePath
     * @param $contentType
     * @param $url
     */
    public function __construct($filePath, $url, $contentType)
    {
        $this->filePath = $filePath;
        $this->url = $url;
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param mixed $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function execute()
    {
        return HttpHelper::upLoadFileHttp($this->filePath,$this->url,$this->contentType);
    }
}