<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\Signet\CreateOfficialTemplate;
use really4you\E\Sign\Services\Signet\CreatePersonalTemplate;

/**
 * 印章服务
 *
 * Class Signet
 * @package really4you\E\Sign\Services\Base
 */
class Signet
{
    /**
     * 创建个人模板印章
     *
     * @param $option
     * @return CreatePersonalTemplate
     */
    public static function createPersonalTemplate($option)
    {
        return new CreatePersonalTemplate($option);
    }

    /**
     * 创建机构模板印章
     *
     * @param $option
     * @return CreateOfficialTemplate
     */
    public static function createOfficialtemplate($option)
    {
        return new CreateOfficialTemplate($option);
    }

}