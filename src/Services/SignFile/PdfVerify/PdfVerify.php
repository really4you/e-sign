<?php

namespace really4you\E\Sign\Services\SignFile\PdfVerify;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Traits\Properties;

/**
 * 文件验签
 *
 * Class PdfVerify
 * @package really4you\E\Sign\Services\SignFile\PdfVerify
 */
class PdfVerify extends EsignRequest implements \JsonSerializable
{
    use Properties;

    private $fileId;

    /**
     * 流程id，需对已归档的签署流程进行验签
     *
     * @var  string
     */
    private $flowId;

    public function __construct($option)
    {
        $this->setProperties($option);
    }

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param mixed $fileId
     * @return PdfVerify
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFlowId()
    {
        return $this->flowId;
    }

    /**
     * @param mixed $flowId
     * @return PdfVerify
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    function build()
    {
        $url="/v1/documents/".$this->fileId."/verify?";
        if($this->flowId !== null){
            $url=$url."flowId=".$this->flowId;
        }

        $this->setUrl($url);
        $this->setReqType(HttpEmun::GET);
    }

    public function jsonSerialize()
    {
        return null;
    }
}