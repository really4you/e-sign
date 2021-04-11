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
    public function CreatePersonalTemplate(array $option)
    {
        $create = SignetService::CreatePersonalTemplate($option);

        return $create->handle();
    }

    /**
     * 创建机构模板印章
     *
     * @param array $option
     * @return mixed
     */
    public function CreateOfficialtemplate(array $option)
    {
        $create = SignetService::CreateOfficialtemplate($option);

        return $create->handle();
    }
}