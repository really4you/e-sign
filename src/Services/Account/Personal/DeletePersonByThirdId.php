<?php

namespace really4you\E\Sign\Services\Account\Personal;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 注销个人账户（按照第三方用户ID注销）
 *
 * Class DeletePersonByThirdId
 * @package really4you\E\Sign\Services\Account\Personal
 */
class DeletePersonByThirdId extends EsignRequest implements \JsonSerializable
{
    private $thirdPartyUserId;

    /**
     * DeletePersonByThirdId constructor.
     * @param $thirdPartyUserId
     */
    public function __construct($thirdPartyUserId)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
    }

    /**
     * @return mixed
     */
    public function getThirdPartyUserId()
    {
        return $this->thirdPartyUserId;
    }

    /**
     * @param mixed $thirdPartyUserId
     */
    public function setThirdPartyUserId($thirdPartyUserId)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
    }



    function build()
    {
        $this->setUrl("/v1/accounts/deleteByThirdId?thirdPartyUserId=".$this->thirdPartyUserId);
        $this->setReqType(HttpEmun::DELETE);
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
            if($value == null|| $key == 'thirdPartyUserId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}