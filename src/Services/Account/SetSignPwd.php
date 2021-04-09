<?php

namespace really4you\E\Sign\Services\Account;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use JsonSerializable;
use really4you\E\Sign\Services\Contracts\RequestUrl;

/**
 * 设置签署密码
 *
 * Class SetSignPwd
 * @package really4you\E\Sign\Services\Account
 */
class SetSignPwd extends EsignRequest implements JsonSerializable,RequestUrl
{
    private $accountId;
    private $password;

    /**
     * SetSignPwd constructor.
     * @param $accountId
     * @param $password
     */
    public function __construct($accountId, $password)
    {
        $this->accountId = $accountId;
        $this->password = $password;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    function build()
    {
        $this->setUrl(sprintf("/v1/accounts/%s/setSignPwd", $this->getAccountId()));
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
            if($value==null||$key=='accountId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}