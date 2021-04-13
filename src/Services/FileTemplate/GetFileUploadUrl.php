<?php

namespace really4you\E\Sign\Services\FileTemplate;

use really4you\E\Sign\Esign;
use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\Exceptions\InvalidArgumentException;
use really4you\E\Sign\Helper\HttpHelper;
use really4you\E\Sign\Helper\UtilHelper;
use really4you\E\Sign\HttpEmun;

/**
 * 通过上传方式创建文件
 *
 * Class GetFileUploadUrl
 * @package really4you\E\Sign\Services\FileTemplate
 */
class GetFileUploadUrl extends EsignRequest implements \JsonSerializable
{
    private $contentMd5;
    private $contentType;
    private $convert2Pdf;
    private $fileName;
    private $fileSize;

    private $requestResult;

    public function __construct($option)
    {
        $file = new \SplFileInfo($option['filePath']);

        if(!$file->isFile()){
            throw new InvalidArgumentException('file does not exist');
        }

        $fileName  = $file->getFilename();
        $extension = $file->getExtension();
        $fileSize  = $file->getSize();

        // set
        $this->setConvert2Pdf($extension == 'pdf' ? false : true);
        $this->setContentMd5(UtilHelper::getContentBase64Md5($option['filePath']));
        $this->setFileName($fileName);
        $this->setFileSize($fileSize);
        $this->setContentType(isset($option['contentType']) ? : 'application/octet-stream');

        $this->build();
        $paramStr = json_encode($this,JSON_UNESCAPED_SLASHES);
        $this->requestResult =  HttpHelper::request($this->getReqType(),$this->getUrl(),$paramStr ,$baseUri = Esign::getBaseUri());
    }

    public function getRequestResult()
    {
        return $this->requestResult;
    }

    /**
     * @return mixed
     */
    public function getContentMd5()
    {
        return $this->contentMd5;
    }

    /**
     * @param mixed $contentMd5
     */
    public function setContentMd5($contentMd5)
    {
        $this->contentMd5 = $contentMd5;
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
    public function getConvert2Pdf()
    {
        return $this->convert2Pdf;
    }

    /**
     * @param mixed $convert2Pdf
     */
    public function setConvert2Pdf($convert2Pdf)
    {
        $this->convert2Pdf = $convert2Pdf;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param mixed $fileSize
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
    }


    function build()
    {
        $this->setUrl("/v1/files/getUploadUrl");
        $this->setReqType(HttpEmun::POST);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if($value===null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}