<?php

namespace really4you\E\Sign\Services\Account\Personal;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use JsonSerializable;
use really4you\E\Sign\Services\Contracts\RequestUrl;

/**
 * 查询个人账户（按照账户ID查询）
 *
 * Class QryPersonByaccountId
 * @package really4you\E\Sign\Services\Account\Personal
 */
class QryPersonByaccountId extends EsignRequest implements JsonSerializable,RequestUrl
{
    private $accountId;

    /**
     * QryPersonByaccountId constructor.
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


    function build()
    {
        $this->setUrl("/v1/accounts/".$this->accountId);
        $this->setReqType(HttpEmun::GET);
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