<?php

namespace really4you\E\Sign\Services\SignFile\Documents;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

class DownDocuments extends EsignRequest implements \JsonSerializable
{
    private $flowId;

    public function __construct($flowId)
    {
        $this->flowId = $flowId;
    }

    public function getFlowId()
    {
        return $this->flowId;
    }

    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    function build()
    {
        $this->setUrl(sprintf('/v1/signflows/%s/documents',$this->getFlowId()));
        $this->setReqType(HttpEmun::GET);
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
        //return null;
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