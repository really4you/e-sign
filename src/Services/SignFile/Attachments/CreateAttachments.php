<?php

namespace really4you\E\Sign\Services\SignFile\Attachments;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

class CreateAttachments extends EsignRequest implements \JsonSerializable
{
    /**
     * 流程id
     *
     * @var
     */
    private $flowId;

    /**
     * 附件列表数据
     * attachmentName string 附件名称，（必须带上文件扩展名，不然会导致后续发起流程校验过不去 示例：合同.pdf ）；
     * fileId string 附件Id
     *
     * @var array
     */
    private $attachments = [];

    /**
         * CreateAttachments constructor.
     * @param $flowId
     * @param $attachments
     */
    public function __construct($flowId, $attachments)
    {
        $this->flowId = $flowId;
        $this->attachments = $attachments;
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
     * @return CreateAttachments
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param mixed $attachments
     * @return CreateAttachments
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    function build()
    {
        $this->setUrl(sprintf('/v1/signflows/%s/attachments',$this->getFlowId()));
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
            if($value === null || $key =='flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}