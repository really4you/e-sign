<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\Account;

/**
 * 个人签署账号API
 *
 * Class Personal
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class Personal
{
    /**
     * 创建个人签署账号
     *
     * @param array $option
     * @return \Psr\Http\Message\StreamInterface
     */
    public function addPersonAccountID(array $option)
    {
        return Account::createPersonByThirdPartyUserId($option)->handle();
    }

    /**
     * 个人账户修改(按照账号ID修改)
     *
     * @param $accountId
     * @param string $email
     * @param string $mobile
     * @param string $name
     * @return \Psr\Http\Message\StreamInterface
     */
    public function UpdatePersonAccountByAccountId(array $option)
    {
        return Account::updatePersonAccountByAccountId($option)->handle();
    }

    /**
     * 查询个人签署账号（通过accountIdID查询）
     *
     * @param string thirdPartyUserId
     * @return array|mixed
     */
    public function qryPersonByAccountId(string $accountId)
    {
        return Account::qryPersonByAccountId($accountId)->handle();
    }

    /**
     * 查询个人签署账号（通过thirdPartyUserId查询)
     *
     * @param string $thirdPartyUserId
     * @return array|mixed
     */
    public function qryPersonByThirdId(string $thirdPartyUserId)
    {
        return Account::qryPersonByThirdId($thirdPartyUserId)->handle();

    }
}