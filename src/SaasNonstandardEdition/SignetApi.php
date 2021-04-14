<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\Signet as SignetService;

/**
 * 印章服务
 *
 * Class SignetApi
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class SignetApi
{
    /**
     * 创建个人模板印章
     *
     * @param array $option
     * @return mixed
     */
    public function createPersonalTemplate(array $option)
    {
        return SignetService::createPersonalTemplate($option)->handle();
    }

    /**
     * 创建机构模板印章
     *
     * @param array $option
     * @return mixed
     */
    public function createOfficialtemplate(array $option)
    {
        return SignetService::createOfficialtemplate($option)->handle();
    }
}