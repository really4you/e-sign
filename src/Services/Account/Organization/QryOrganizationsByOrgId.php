<?php

namespace really4you\E\Sign\Services\Account\Organization;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use JsonSerializable;
use really4you\E\Sign\Services\Contracts\RequestUrl;

/**
 * 轩辕API查询机构账号（按照账号ID查询）
 * @author  澄泓
 * @date  2020/11/19 17:54
 */
class QryOrganizationsByOrgId extends EsignRequest implements JsonSerializable,RequestUrl
{
    private $orgId;

    /**
     * QryOrganizationsByOrgId constructor.
     * @param $orgId
     */
    public function __construct($orgId)
    {
        $this->orgId = $orgId;
    }

    /**
     * @return mixed
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * @param mixed $orgId
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    function build()
    {
        $this->setUrl("/v1/organizations/".$this->orgId);
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
            if($value==null||$key=='orgId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}