<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ConnectCancelMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateCancelRequest;

class ConnectCancel extends IyzipayResource
{
    private $paymentId;
    private $price;
    private $connectorName;

    public static function create(CreateCancelRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyziconnect/cancel", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ConnectCancelMapper::create($rawResult)->jsonDecode()->mapConnectCancel(new ConnectCancel());
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getConnectorName()
    {
        return $this->connectorName;
    }

    public function setConnectorName($connectorName)
    {
        $this->connectorName = $connectorName;
    }
}