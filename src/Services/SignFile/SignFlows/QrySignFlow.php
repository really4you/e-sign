<?php

namespace really4you\E\Sign\Services\SignFile\SignFlows;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 签署流程查询
 *
 * Class QrySignFlow
 * @package really4you\E\Sign\Services\SignFile\SignFlows
 */
class QrySignFlow extends EsignRequest
{
    private $flowId;

    /**
     * QrySignFlow constructor.
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
     * @return QrySignFlow
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    function build()
    {
        $this->setUrl("/v1/signflows/".$this->flowId);
        $this->setReqType(HttpEmun::GET);
    }
}