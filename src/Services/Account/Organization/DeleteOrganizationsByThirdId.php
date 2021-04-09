<?php

namespace really4you\E\Sign\Services\Account\Organization;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use JsonSerializable;
use really4you\E\Sign\Services\Contracts\RequestUrl;

/**
 * 注销机构账号（按照第三方机构ID注销）
 *
 * Class DeleteOrganizationsByThirdId
 * @package really4you\E\Sign\Services\Account\Organization
 */
class DeleteOrganizationsByThirdId extends EsignRequest implements JsonSerializable,RequestUrl
{
    private $thirdPartyUserId;

    /**
     * DeleteOrganizationsByThirdId constructor.
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
        $this->setUrl("/v1/organizations/deleteByThirdId?thirdPartyUserId=".$this->thirdPartyUserId);
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
            if($value==null||$key=='thirdPartyUserId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}