<?php

namespace really4you\E\Sign\Services\SignFile\SignFields;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 查询签署区列表
 *
 * Class QrySignFields
 * @package really4you\E\Sign\Services\SignFile\SignFields
 */
class QrySignFields extends EsignRequest
{
    private $flowId;
    private $accountId;
    private $signfieldIds;

    /**
     * QrySignFields constructor.
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
     * @return QrySignFields
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     * @return QrySignFields
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignfieldIds()
    {
        return $this->signfieldIds;
    }

    /**
     * @param mixed $signfieldIds
     * @return QrySignFields
     */
    public function setSignfieldIds($signfieldIds)
    {
        $this->signfieldIds = $signfieldIds;
        return $this;
    }

    function build()
    {
        $url="/v1/signflows/".$this->flowId."/signfields?";
        if($this->accountId!=null){
            $url=$url."&accountId=".$this->accountId;
        }
        if($this->signfieldIds!=null){
            $url=$url."&signfieldIds=".$this->signfieldIds;
        }

        $this->setUrl($url);
        $this->setReqType(HttpEmun::GET);
    }
}