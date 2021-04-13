<?php

namespace really4you\E\Sign\Services\SignFile\Attachments;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 流程附件列表
 *
 * Class QryAttachments
 * @package really4you\E\Sign\Services\SignFile\Attachments
 */
class QryAttachments extends EsignRequest implements \JsonSerializable
{
    private $flowId;

    /**
     * QryAttachments constructor.
     * @param $flowId
     */
    public function __construct($flowId)
    {
        $this->flowId = $flowId;
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
     * @return QryAttachments
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    function build()
    {
        $this->setUrl(sprintf('/v1/signflows/%s/attachments',$this->getFlowId()));
        $this->setReqType(HttpEmun::GET);
    }

    public function jsonSerialize()
    {
        return null;
    }
}