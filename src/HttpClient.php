<?php

namespace really4you\E\Sign;

use GuzzleHttp\Client;
use really4you\E\Sign\Exceptions\InvalidArgumentException;
use really4you\E\Sign\Exceptions\HttpException;
use really4you\E\Sign\Helper\UtilHelper;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class HttpClient
{
    /**
     *
     * @var string
     */
    protected $appId;

    /**
     *
     * @var String
     */
    protected $secret;

    /**
     * @var array
     */
    protected $guzzleOptions = [];

    /**
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * default host url
     *
     * @var string
     */
    protected $baseUri = "https://smlopenapi.esign.cn";
    protected $token;

    public function __construct($appId, $secret)
    {
        $this->appId    = $appId;
        $this->secret   = $secret;

//        $this->setBaseUri($this->baseUri);
//        $this->getAccessToken();
    }



    public function getToken()
    {
        return $this->token;
    }

    /**
     * set http baseUri
     *
     * @param $url
     * @return $this
     */
    public function setBaseUri($url)
    {
        $this->baseUri = $url;

        $this->guzzleOptions['base_uri'] = $url;

        return $this;
    }


    public function setHeader($header)
    {
        $this->guzzleOptions['headers'] = $header;

        return $this;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient()
    {
        $this->guzzleOptions['verify']  = false;

        return new Client($this->guzzleOptions);
    }

    /**
     * send request
     *
     * @param $type
     * @param $uri
     * @param $param
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function doRequest($type, $url, $param)
    {
        if(strtoupper($type) == "GET" || strtoupper($type) == "DELETE"){
            $param = null;
        }

        $contentMd5 = UtilHelper::getContentMd5($param);
        // 签名
        $reqSignature = UtilHelper::getSignature($type,"*/*","application/json; charset=UTF-8",$contentMd5,"","",$url);
//        $header = self::buildCommHeader($contentMd5,$reqSignature);


        return $this->getHttpClient()->request($type,$url,$param)->getBody()->getContents();
    }

    public function httpPost($uri , $param = [])
    {
        return $this->getHttpClient()->request('POST',$uri,$param);
    }

    public function httpGet($uri , $param = [])
    {
        return $this->getHttpClient()->request('GET',$uri,$param);
    }

    /**
     * @param array $options
     */
    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }


    public function buildCommHeader($contentMD5,$reqSignature)
    {
        $headers = array(
            'X-Tsign-Open-App-Id:'.Esign::getProjectId(),
            'X-Tsign-Open-Ca-Timestamp:'.UtilHelper::getMillisecond(),
            'Accept:*/*',
            'X-Tsign-Open-Ca-Signature:'.$reqSignature,
            'Content-MD5:'.$contentMD5,
            'Content-Type:application/json; charset=UTF-8',
            'X-Tsign-Open-Auth-Mode:Signature',
        );
        return $headers;
    }

    /**
     * getToken
     *
     * @param string $prefix
     * @param string $grantType
     * @return mixed
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
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
                "appId"=>$this->appId,
                "secret"=>$this->secret,
                "grantType"=>$grantType
            ];

            $url .= '?' . http_build_query($param);

            try {
                $response = $this->getHttpClient()->get($url)
                    ->getBody()->getContents();

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

        $this->token = $data['token'];

        return $this;
    }


}