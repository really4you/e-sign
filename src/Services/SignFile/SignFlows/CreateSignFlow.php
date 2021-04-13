<?php

namespace really4you\E\Sign\Services\SignFile\SignFlows;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Traits\Properties;

/**
 * 签署流程创建
 *
 * Class CreateSignFlow
 * @package really4you\E\Sign\Services\SignFile\SignFlows
 */
class CreateSignFlow extends EsignRequest implements \JsonSerializable
{
    use Properties;

    /**
     * 是否自动归档，默认false；如设置为true，则在调用签署流程开启后，当所有签署人签署完毕，系统自动将流程归档，状态变为“已完成”状态；
     * 如设置为false，则在调用流程开启后，需主动调用签署流程归档接口，将流程状态变更为“已完成”；已完成的流程才可下载签署后的文件
     *
     * @var
     */
    private $autoArchive;

    /**
     * 文件主题 注：名称不支持以下9个字符：/ \ : * " < > | ？
     *
     * @var
     */
    private $businessScene;

    /**
     * 任务配置信息
     *
     * @var array
     */
    private $configInfo;

    /**
     * 文件有效截止日期,毫秒，默认不失效；若时间到了该参数设置的时间，则会触发【流程文件过期通知】
     *
     * @var
     */
    private $contractValidity;

    /**
     * 文件到期前，提前多少小时回调提醒续签，小时（时间区间：1小时——15天），默认不提醒；若时间到了该参数设置的时间，则会触发
     *
     * @var
     */
    private $contractRemind;

    /**
     * 签署有效截止日期,毫秒，默认不失效；
     *
     * @var
     */
    private $signValidity;

    /**
     * 发起人账户id，即发起本次签署的操作人个人账号id；如不传，默认由对接平台发起
     *
     * @var
     */
    private $initiatorAccountId;

    /**
     * 发起方主体id，如存在个人代机构发起签约，则需传入机构id；如不传，则默认是对接平台
     *
     * @var
     */
    private $initiatorAuthorizedAccountId;


    public function __construct($option)
    {
        $this->setProperties($option);
    }

    /**
     * @return mixed
     */
    public function getAutoArchive()
    {
        return $this->autoArchive;
    }

    /**
     * @param mixed $autoArchive
     * @return CreateSignFlow
     */
    public function setAutoArchive($autoArchive)
    {
        $this->autoArchive = $autoArchive;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessScene()
    {
        return $this->businessScene;
    }

    /**
     * @param mixed $businessScene
     * @return CreateSignFlow
     */
    public function setBusinessScene($businessScene)
    {
        $this->businessScene = $businessScene;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfigInfo()
    {
        return $this->configInfo;
    }

    /**
     * @param mixed $configInfo
     * @return CreateSignFlow
     */
    public function setConfigInfo($configInfo)
    {
        $this->configInfo = $configInfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContractValidity()
    {
        return $this->contractValidity;
    }

    /**
     * @param mixed $contractValidity
     * @return CreateSignFlow
     */
    public function setContractValidity($contractValidity)
    {
        $this->contractValidity = $contractValidity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContractRemind()
    {
        return $this->contractRemind;
    }

    /**
     * @param mixed $contractRemind
     * @return CreateSignFlow
     */
    public function setContractRemind($contractRemind)
    {
        $this->contractRemind = $contractRemind;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignValidity()
    {
        return $this->signValidity;
    }

    /**
     * @param mixed $signValidity
     * @return CreateSignFlow
     */
    public function setSignValidity($signValidity)
    {
        $this->signValidity = $signValidity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitiatorAccountId()
    {
        return $this->initiatorAccountId;
    }

    /**
     * @param mixed $initiatorAccountId
     * @return CreateSignFlow
     */
    public function setInitiatorAccountId($initiatorAccountId)
    {
        $this->initiatorAccountId = $initiatorAccountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitiatorAuthorizedAccountId()
    {
        return $this->initiatorAuthorizedAccountId;
    }

    /**
     * @param mixed $initiatorAuthorizedAccountId
     * @return CreateSignFlow
     */
    public function setInitiatorAuthorizedAccountId($initiatorAuthorizedAccountId)
    {
        $this->initiatorAuthorizedAccountId = $initiatorAuthorizedAccountId;
        return $this;
    }

    function build()
    {
        $this->setUrl("/v1/signflows");
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
            if ($value === null) {
                continue;
            }
            $json[$key] = $value;
        }

        return $json;
    }

}