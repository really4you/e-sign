<?php

namespace really4you\E\Sign\Services\Account;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 设置静默签署授权
 *
 * Class SetSignAuth
 * @package really4you\E\Sign\Services\Account
 */
class SetSignAuth extends EsignRequest implements \JsonSerializable
{
    /**
     * 个人/机构签署账号ID，通过创建个人/机构签署账号接口获取
     *
     * @var string
     */
    private $accountId;

    /**
     * 授权截止时间, 格式为yyyy-MM-dd HH:mm:ss，默认无限期
     *
     * @var string
     */
    private $deadline;

    /**
     * SetSignAuth constructor.
     * @param $accountId
     */
    public function __construct($accountId)
    {
        $this->accountId = $accountId;
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
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    function build()
    {
        $this->setUrl("/v1/signAuth/".$this->accountId);
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
            if($value == null || $key =='accountId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}