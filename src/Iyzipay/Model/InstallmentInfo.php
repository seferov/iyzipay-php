<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\InstallmentInfoMapper;
use Iyzipay\Options;
use Iyzipay\Request\RetrieveInstallmentInfoRequest;

class InstallmentInfo extends IyzipayResource
{
    private $installmentDetails;

    public static function retrieve(RetrieveInstallmentInfoRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/installment", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return InstallmentInfoMapper::create($rawResult)->jsonDecode()->mapInstallmentInfo(new InstallmentInfo());
    }

    public function getInstallmentDetails()
    {
        return $this->installmentDetails;
    }

    public function setInstallmentDetails($installmentDetails)
    {
        $this->installmentDetails = $installmentDetails;
    }
}