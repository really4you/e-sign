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
     * @param $accountId
     * @param $color
     * @param $type
     * @return CreatePersonalTemplate
     */
    public static function CreatePersonalTemplate($option)
    {
        return new CreatePersonalTemplate($option);
    }

    public static function CreateOfficialtemplate($option)
    {
        return new CreateOfficialTemplate($option);
    }

}