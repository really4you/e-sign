<?php

namespace really4you\E\Sign\Services\SignFile\SignFields;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 添加手动盖章签署区
 *
 * Class CreateHandSign
 * @package really4you\E\Sign\Services\SignFile\SignFields
 */
class CreateHandSign extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $signfields;

    /**
     * CreateHandSign constructor.
     * @param $flowId
     * @param $signfields
     */
    public function __construct($flowId, array $signfields)
    {
        $this->flowId = $flowId;
        $this->signfields = $signfields;
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
     * @return CreateHandSign
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignfields()
    {
        return $this->signfields;
    }

    /**
     * @param mixed $signfields
     * @return CreateHandSign
     */
    public function setSignfields(array $signfields)
    {
        $this->signfields = $signfields;
        return $this;
    }

    function build()
    {
        $this->setUrl(sprintf('/v1/signflows/%s/signfields/handSign',$this->getFlowId()));
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
            if($value ===null || $key =='flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}