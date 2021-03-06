<?php

namespace really4you\E\Sign\Services\SignFile\Signers;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 获取签署地址
 *
 * Class GetFileSignUrl
 * @package really4you\E\Sign\Services\SignFile\Signers
 */
class GetFileSignUrl extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $accountId;
    private $organizeId;
    private $urlType;
    private $appScheme;

    /**
     * GetFileSignUrl constructor.
     * @param $flowId
     * @param $accountId
     */
    public function __construct($flowId, $accountId)
    {
        $this->flowId = $flowId;
        $this->accountId = $accountId;
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
     * @return GetFileSignUrl
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
     * @return GetFileSignUrl
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrganizeId()
    {
        return $this->organizeId;
    }

    /**
     * @param mixed $organizeId
     * @return GetFileSignUrl
     */
    public function setOrganizeId($organizeId)
    {
        $this->organizeId = $organizeId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlType()
    {
        return $this->urlType;
    }

    /**
     * @param mixed $urlType
     * @return GetFileSignUrl
     */
    public function setUrlType($urlType)
    {
        $this->urlType = $urlType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAppScheme()
    {
        return $this->appScheme;
    }

    /**
     * @param mixed $appScheme
     * @return GetFileSignUrl
     */
    public function setAppScheme($appScheme)
    {
        $this->appScheme = $appScheme;
        return $this;
    }

    function build()
    {
        $url="/v1/signflows/".$this->flowId."/executeUrl?accountId=".$this->accountId;
        if($this->organizeId!==null){
            $url=$url."&organizeId=".$this->organizeId;
        }
        if($this->urlType!==null){
            $url=$url."&urlType=".$this->urlType;
        }
        if($this->appScheme!==null){
            $url=$url."&appScheme=".$this->appScheme;
        }

        $this->setUrl($url);
        $this->setReqType(HttpEmun::GET);
    }

    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            $json[$key] = $value;
        }

        return $json;
    }
}