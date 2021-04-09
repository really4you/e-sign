<?php

namespace really4you\E\Sign\Services\Account\Organization;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use JsonSerializable;
use really4you\E\Sign\Services\Contracts\RequestUrl;
use really4you\E\Sign\Traits\Properties;

/**
 * 机构账号修改（按照账号ID修改）
 *
 * Class UpdateOrganizationsByOrgId
 * @package really4you\E\Sign\Services\Account\Organization
 */
class UpdateOrganizationsByOrgId extends EsignRequest implements JsonSerializable,RequestUrl
{
    use Properties;

    private $orgId;
    private $name;
    private $idType;
    private $idNumber;
    private $orgLegalIdNumber;
    private $orgLegalName;

    /**
     * set
     *
     * @var string
     */
    protected $prefix = 'set';

    /**
     * UpdateOrganizationsByOrgId constructor.
     * @param $orgId
     */
    public function __construct(array $option)
    {
        $this->setProperties($option);
//        if(!isset($option['orgId'])){
//            throw  new  InvalidArgumentException('orgId not exits');
//        }
//        $this->orgId = $option['orgId'];

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


    function build()
    {
       $this->setUrl("/v1/organizations/".$this->orgId);
       $this->setReqType(HttpEmun::PUT);
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