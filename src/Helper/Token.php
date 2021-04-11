<?php

namespace really4you\E\Sign\Helper;

use really4you\E\Sign\Esign;
use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\Exceptions\InvalidArgumentException;
use really4you\E\Sign\Exceptions\HttpException;
use really4you\E\Sign\Traits\HasHttpRequest;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class Token extends EsignRequest
{
    use HasHttpRequest;

    public function build()
    {
        // TODO: Implement build() method.
    }

    /**
     * get token
     *
     * @param string $prefix
     * @param string $grantType
     * @return mixed
     *
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getAccessToken($prefix = 'default_e_sign', $grantType = 'client_credentials')
    {

        $url    = $this->baseUri."/v1/oauth2/access_token";
        $prefix.= '_token';

        $cache = new FilesystemAdapter();
        $numProducts = $cache->getItem($prefix);

        if (!$numProducts->isHit()) {
            // 元素在缓存中不存在
            $param = [
                "appId"=>Esign::getProjectId(),
                "secret"=>Esign::getProjectScert(),
                "grantType"=>$grantType
            ];

            $url .= '?' . http_build_query($param);

            try {

                $response = $this->get($url);
                $result = (array)json_decode($response,true);

                // cache token
                if(isset($result['code']) && $result['code'] == 0){
                    $resultData = $result['data'];
                    $time = floor($resultData['expiresIn'] / 1000);

                    $datetime = new \DateTime();
                    $datetime->setTimestamp($time);
                    $numProducts->set($resultData);
                    $numProducts->expiresAt($datetime);
                    $cacheResult = $cache->save($numProducts);

                    $data = $cacheResult ? $resultData : [];
                }

            } catch (\Exception $e) {
                throw new HttpException($e->getMessage(), $e->getCode(), $e);
            }
        }else {
            $data = $numProducts->get();
        }

        if(!isset($data['token'])){
            throw new InvalidArgumentException('Token acquisition failed');
        }

        return $data['token'];
    }
}