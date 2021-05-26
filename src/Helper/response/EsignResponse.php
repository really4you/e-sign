<?php

namespace really4you\E\Sign\Helper\response;

class EsignResponse
{
    private $status;
    private $body;

    /**
     * EsignResponse constructor.
     * @param $status
     * @param $body
     */
    public function __construct($status, $body)
    {
        $this->status = $status;
        $this->body = $body;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getBody()
    {
        return json_decode($this->body, true);
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

}