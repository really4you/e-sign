<?php

namespace really4you\E\Sign\Services\Account\Organization;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Traits\Properties;

/**
 * 机构账号创建
 *
 * Class CreateOrganizationsByThirdPartyUserId
 * @package really4you\E\Sign\Account
 */
class CreateOrganizationsByThirdPartyUserId extends EsignRequest implements \JsonSerializable
{
    use Properties;

    private $thirdPartyUserId;
    private $creator;
    private $name;
    private $idType;
    private $idNumber;
    private $orgLegalIdNumber;
    private $orgLegalName;

    public function __construct($option)
    {
        $this->setProperties($option);
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

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * @param mixed $idType
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;
    }

    /**
     * @return mixed
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @param mixed $idNumber
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
    }

    /**
     * @return mixed
     */
    public function getOrgLegalIdNumber()
    {
        return $this->orgLegalIdNumber;
    }

    /**
     * @param mixed $orgLegalIdNumber
     */
    public function setOrgLegalIdNumber($orgLegalIdNumber)
    {
        $this->orgLegalIdNumber = $orgLegalIdNumber;
    }

    /**
     * @return mixed
     */
    public function getOrgLegalName()
    {
        return $this->orgLegalName;
    }

    /**
     * @param mixed $orgLegalName
     */
    public function setOrgLegalName($orgLegalName)
    {
        $this->orgLegalName = $orgLegalName;
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
        $this->setUrl("/v1/organizations/createByThirdPartyUserId");
        $this->setReqType(HttpEmun::POST);
    }
}