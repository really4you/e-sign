<?php

namespace really4you\E\Sign\Services\FileTemplate;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\Exceptions\InvalidArgumentException;
use really4you\E\Sign\Helper\UtilHelper;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Services\Contracts\RequestUrl;

/**
 * 通过上传方式创建模板
 *
 * Class CreateTemplateByUploadUrl
 * @package really4you\E\Sign\Services\FileTemplate
 */
class CreateTemplateByUploadUrl extends EsignRequest implements \JsonSerializable,RequestUrl
{
    private $contentMd5;

    /**
     * 目标文件的MIME类型，支持：（1）application/octet-stream（2）application/pdf 注意，后面文件流上传的Content-Type参数要和这里一致，不然就会有403的报错
     *
     * @var
     */
    private $contentType;
    private $fileName;

    /**
     * 是否需要转成pdf，如果模板文件为.doc/.docx 传true，为pdf传false
     *
     * @var
     */
    private $convert2Pdf;

    protected $defaultProperties = ['convert2Pdf'];

    public function __construct($option)
    {
        $file = new \SplFileInfo($option['filePath']);

        if(!$file->isFile()){
            throw new InvalidArgumentException('file does not exist');
        }

        $fileName =  $file->getFilename();
        $extension = $file->getExtension();

        // set
        $this->setConvert2Pdf($extension == 'pdf' ? false : true);
        $this->contentMd5  = UtilHelper::getContentBase64Md5($option['filePath']);
        $this->setFileName($fileName);
        $this->setContentType(isset($option['contentType']) ? : 'application/octet-stream');
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
    public function setContentType($contentType = 'application/octet-stream')
    {
        $this->contentType = $contentType;
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
    public function getConvert2Pdf()
    {
        return $this->convert2Pdf;
    }

    /**
     * @param mixed $convert2Pdf
     */
    public function setConvert2Pdf($convert2Pdf = false)
    {
        $this->convert2Pdf = $convert2Pdf;
    }


    function build()
    {
        $this->setUrl("/v1/docTemplates/createByUploadUrl");
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
            if($value === null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}