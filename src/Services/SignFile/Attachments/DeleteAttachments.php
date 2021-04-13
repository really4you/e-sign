<?php

namespace really4you\E\Sign\Services\SignFile\Attachments;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

class DeleteAttachments extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $fileIds;

    /**
     * DeleteAttachments constructor.
     * @param $flowId
     * @param $fileIds
     */
    public function __construct($flowId, $fileIds)
    {
        $this->flowId = $flowId;
        $this->fileIds = $fileIds;
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
     * @return DeleteAttachments
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileIds()
    {
        return $this->fileIds;
    }

    /**
     * @param mixed $fileIds
     * @return DeleteAttachments
     */
    public function setFileIds($fileIds)
    {
        $this->fileIds = $fileIds;
        return $this;
    }

    function build()
    {
        $this->setUrl(sprintf('/v1/signflows/%s/attachments?fileIds=%s',$this->getFlowId(),$this->getFileIds()));
        $this->setReqType(HttpEmun::DELETE);
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
        return null;
    }
}