<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\Organization;

/**
 * 机构签署账号API
 *
 * Class Organizations
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class Organizations
{
    /**
     * 创建机构签署账号
     *
     * @param $thirdPartyUserId
     * @param $creator
     * @param $name
     * @param $idType
     * @param $idNumber
     * @param string $orgLegalIdNumber 机构法定代表人证件号
     * @param string $orgLegalName 机构法定代表人名称
     * @return \Psr\Http\Message\StreamInterface
     */
    public function createOrganizationsByThirdPartyUserId(array $option)
    {
        $create = Organization::createOrganizationsByThirdPartyUserId($option);

        return $create->handle();
    }


    /**
     * 修改机构签署账号（通过orgId修改）
     *
     * @param $accountId
     * @param string $email
     * @param string $mobile
     * @param string $name
     * @return \Psr\Http\Message\StreamInterface
     */
    public function updateOrganizationsByOrgId(array $option)
    {
        $organ = Organization::updateOrganizationsByOrgId($option);

        return $organ->handle();
    }
}