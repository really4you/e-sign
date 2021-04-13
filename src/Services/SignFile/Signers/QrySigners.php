<?php

namespace really4you\E\Sign\Services\SignFile\Signers;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 流程签署人列表
 *
 * Class QrySigners
 * @package really4you\E\Sign\Services\SignFile\Signers
 */
class QrySigners extends EsignRequest
{
    private $flowId;

    /**
     * QrySigners constructor.
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
     * @return QrySigners
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    function build()
    {
        $this->setUrl("/v1/signflows/".$this->flowId."/signers");
        $this->setReqType(HttpEmun::GET);
    }
}