<?php

namespace Iyzipay\Model;

use Iyzipay\HttpClient;
use Iyzipay\IyzipayResource;
use Iyzipay\Model\Mapper\ApprovalMapper;
use Iyzipay\Options;
use Iyzipay\Request\CreateApprovalRequest;

class Approval extends IyzipayResource
{
    private $paymentTransactionId;

    public static function create(CreateApprovalRequest $request, Options $options)
    {
        $rawResult = HttpClient::create()->post($options->getBaseUrl() . "/payment/iyzipos/item/approve", parent::getHttpHeaders($request, $options), $request->toJsonString());
        return ApprovalMapper::create($rawResult)->jsonDecode()->mapApproval(new Approval());
    }

    public function getPaymentTransactionId()
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId($paymentTransactionId)
    {
        $this->paymentTransactionId = $paymentTransactionId;
    }
}