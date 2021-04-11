<?php

namespace really4you\E\Sign\Services;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 查询认证信息
 *
 * Class QueryAuthenticationInformation
 * @package really4you\E\Sign\Services
 */
class QueryAuthenticationInformation extends EsignRequest implements \JsonSerializable
{
    /**
     * 实名认证流程Id
     *
     * @var
     */
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
    }

    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if($value == null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }

    public function build()
    {
        $this->setUrl(sprintf("/v2/identity/auth/api/common/%s/detail", $this->getFlowId()));
        $this->setReqType(HttpEmun::GET);
    }
}