<?php

namespace really4you\E\Sign\Services\Authentication\Organization\Api;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Traits\Properties;

/**
 * 发起企业核身认证3要素检验
 *
 * Class ThreeFactorsTest
 * @package really4you\E\Sign\Services\Authentication\Organization\Api
 */
class ThreeFactorsTest extends EsignRequest implements \JsonSerializable
{
    use Properties  ;

    /**
     * 组织机构证件（如营业执照）上的组织机构名称
     *
     * @var
     */
    private $name;

    /**
     * 组织机构证件号,支持统一社会信用代码号和工商注册号（部分个体工商户）
     *
     * @var
     */
    private $orgCode;

    /**
     * 法定代表人名称
     *
     * @var
     */
    private $legalRepName;

    /**
     * 对接方业务上下文id，将在异步通知及跳转时携带返回对接方
     *
     * @var
     */
    private $contextId;

    /**
     * 	认证结束后异步通知地址
     *
     * @var
     */
    private $notifyUrl;


    public function __construct($option)
    {
        $this->setProperties($option);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getOrgCode()
    {
        return $this->orgCode;
    }

    public function setOrgCode($orgCode)
    {
        $this->orgCode = $orgCode;
    }

    public function getLegalRepName()
    {
        return $this->legalRepName;
    }

    public function setLegalRepName($legalRepName)
    {
        $this->legalRepName = $legalRepName;
    }


    public function getContextId()
    {
        return $this->contextId;
    }

    public function setContextId($contextId)
    {
        $this->contextId = $contextId;
    }

    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }

    public function build()
    {
        $this->setUrl("/v2/identity/auth/api/organization/threeFactors");
        $this->setReqType(HttpEmun::POST);
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
}