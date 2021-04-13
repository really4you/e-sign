<?php

namespace really4you\E\Sign\Services\SignFile\SignFlows;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 签署流程撤销
 *
 * Class RevokeSignFlow
 * @package really4you\E\Sign\Services\SignFile\SignFlows
 */
class RevokeSignFlow extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $operatorId;
    private $revokeReason;

    /**
     * RevokeSignFlow constructor.
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
     * @return RevokeSignFlow
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperatorId()
    {
        return $this->operatorId;
    }

    /**
     * @param mixed $operatorId
     * @return RevokeSignFlow
     */
    public function setOperatorId($operatorId)
    {
        $this->operatorId = $operatorId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRevokeReason()
    {
        return $this->revokeReason;
    }

    /**
     * @param mixed $revokeReason
     * @return RevokeSignFlow
     */
    public function setRevokeReason($revokeReason)
    {
        $this->revokeReason = $revokeReason;
        return $this;
    }

    function build()
    {
        $this->setUrl(sprintf('/v1/signflows/%s/revoke',$this->getFlowId()));
        $this->setReqType(HttpEmun::PUT);
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
            if ($value === null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}