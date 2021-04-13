<?php

namespace really4you\E\Sign\Services\Authentication\Personal\Api\BankCard4Factors;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Traits\Properties;

/**
 * 个人银行4要素实名认证
 *
 * Class BankCard4Factors
 * @package really4you\E\Sign\Services\Account\Authentication
 */
class BankCard4Factors extends EsignRequest implements \JsonSerializable
{
    use Properties;

    private $accountId;
    private $mobileNo;
    private $bankCardNo;
    private $repetition;
    private $contextId;
    private $notifyUrl;
    private $grade;

    public function __construct($option)
    {
        $this->setProperties($option);
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    public function getMobileNo()
    {
        return $this->mobileNo;
    }

    public function setMobileNo($mobileNo)
    {
        $this->mobileNo = $mobileNo;
    }

    public function getBankCardNo()
    {
        return $this->bankCardNo;
    }

    public function setBankCardNo($bankCardNo)
    {
        $this->bankCardNo = $bankCardNo;
    }

    public function getRepetition()
    {
        return $this->repetition;
    }

    public function setRepetition($repetition)
    {
        $this->repetition = $repetition;
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

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
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
            if($value == null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }

    public function build()
    {
        $this->setUrl(sprintf("/v2/identity/auth/api/individual/%s/bankCard4Factors", $this->getAccountId()));
        $this->setReqType(HttpEmun::POST);
    }
}