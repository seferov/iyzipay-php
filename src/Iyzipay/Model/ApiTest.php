<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\IyzipayResourceMapper;
use Iyzipay\Options;

class ApiTest extends IyzipayResource
{
    public static function retrieve(Options $options)
    {
        $rawResult = HttpClient::create()->get($options->getBaseUrl() . "/payment/test");
        return IyzipayResourceMapper::create($rawResult)->jsonDecode()->mapResource(new IyzipayResource());
    }
}
