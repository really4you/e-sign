<?php

namespace really4you\E\Sign\Services\Account\Authentication\BankCard4Factors;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 银行预留手机号验证码校验
 *
 * Class MobileVerificationCode
 * @package really4you\E\Sign\Services\Account\Authentication\BankCard4Factors
 */
class MobileVerificationCode extends EsignRequest implements \JsonSerializable
{
    /**
     * 实名认证流程Id
     *
     * @var
     */
    private $flowId;

    /**
     * 短信验证码
     *
     * @var
     */
    private $authcode;

    public function __construct($flowId, $authcode)
    {
        $this->flowId = $flowId;
        $this->authcode  = $authcode;
    }

    public function getFlowId()
    {
        return $this->flowId;
    }

    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
    }

    public function getAuthcode()
    {
        return $this->authcode;
    }

    public function setAuthcode($authcode)
    {
        $this->authcode = $authcode;
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
        $this->setUrl(sprintf("/v2/identity/auth/pub/individual/%s/bankCard4Factors", $this->getFlowId()));
        $this->setReqType(HttpEmun::POST);
    }
}