<?php

namespace really4you\E\Sign\Services\Signet;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Traits\Properties;

/**
 * 创建个人模板印章
 *
 * Class CreatePersonalTemplate
 * @package really4you\E\Sign\Services\Signet
 */
class CreatePersonalTemplate extends EsignRequest implements \JsonSerializable
{
    use Properties;

    private $accountId;

    /**
     * 印章颜色（1）RED-红色（2）BLUE-蓝色    （3）BLACK-黑色
     *
     * @var
     */
    private $color;

    /**
     * 模板类型 说明：以下印章样式中正方形印章（SQUARE）和带框华文行楷（HWXKBORDER）支持长度为 2-4或7-9或14-16 个字符的姓名，
     * 其他印章样式支持长度为2-18个字符的姓名
     * BORDERLESS:  无边框矩形印章, RECTANGLE: 带边框矩形印章, SQUARE : 正方形印章
     *
     * @var
     */
    private $type;

    /**
     * 印章高度, 默认95px
     *
     * @var
     */
    private $height;

    /**
     *  印章宽度, 默认95px
     *
     * @var
     */
    private $width;

    /**
     * 印章别名
     *
     * @var
     */
    private $alias;

    protected $defaultProperties = ['color','type','height','width'];

    public function __construct($option)
    {
        $this->setProperties($option);;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color = 'RED')
    {
        $this->color = $color;
    }

    public function getType()
    {
        return $this->accountId;
    }

    public function setType($type = 'BORDERLESS')
    {
        $this->type = $type;
    }


    public function getHeight()
    {
        return $this->color;
    }

    public function setHeight($height = 95)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width = 95)
    {
        $this->width = $width;
    }

    public function getAlias()
    {
        return $this->width;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }


    function build()
    {
        $this->setUrl(sprintf("/v1/accounts/%s/seals/personaltemplate", $this->getAccountId()));
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
            // e->defaultProperties
            if($value == null || is_array($value)) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}