<?php

namespace really4you\E\Sign\Services\Account\Personal;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use JsonSerializable;
use really4you\E\Sign\Services\Contracts\RequestUrl;
use really4you\E\Sign\Traits\Properties;

/**
 * 个人账号创建
 *
 * Class CreatePersonByThirdPartyUserId
 * @package really4you\E\Sign\Account
 */
class CreatePersonByThirdPartyUserId extends EsignRequest implements JsonSerializable ,RequestUrl
{
    use Properties;

    private $thirdPartyUserId;
    private $name;
    private $idType;
    private $idNumber;
    private $mobile;
    private $email;

    public function __construct($option)
    {
        $this->setProperties($option);
    }

    public function getThirdPartyUserId()
    {
        return $this->thirdPartyUserId;
    }

    public function setThirdPartyUserId($thirdPartyUserId)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getIdType()
    {
        return $this->idType;
    }

    public function setIdType($idType)
    {
        $this->idType = $idType;
    }


    public function getIdNumber()
    {
        return $this->idNumber;
    }

    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function build()
    {
        $this->setUrl("/v1/accounts/createByThirdPartyUserId");
        $this->setReqType(HttpEmun::POST);
    }

    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if($value==null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}