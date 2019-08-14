<?php
/*
 * Copyright notice:
 * (c) Copyright 2018 RocketGate
 * All rights reserved.
 *
 * The copyright notice must not be removed without specific, prior
 * written permission from RocketGate.
 *
 * This software is protected as an unpublished work under the U.S. copyright
 * laws. The above copyright notice is not intended to effect a publication of
 * this work.
 * This software is the confidential and proprietary information of RocketGate.
 * Neither the binaries nor the source code may be redistributed without prior
 * written permission from RocketGate.
 *
 * The software is provided "as-is" and without warranty of any kind, express, implied
 * or otherwise, including without limitation, any warranty of merchantability or fitness
 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
 * special, incidental, indirect, consequential or other damages of any kind, or any damages
 * whatsoever arising out of or in connection with the use or performance of this software,
 * including, without limitation, damages resulting from loss of use, data or profits, and
 * whether or not advised of the possibility of damage, regardless of the theory of liability.
 * 
 */

namespace RocketGate\Sdk\Tests;

use RocketGate\Sdk\GatewayRequest;

class PurchaseTest extends BaseTestCase
{
    function getTestName() : string
    {
        return "PurchaseTest";
    }

    function test()
    {
        $this->request->Set(GatewayRequest::AMOUNT(), "9.99");
         $this->request->Set(GatewayRequest::IPADDRESS(), '72.229.28.185');

        $this->request->Set(GatewayRequest::BILLING_ADDRESS(), "123 Main St");
        $this->request->Set(GatewayRequest::BILLING_CITY(), "Las Vegas");
        $this->request->Set(GatewayRequest::BILLING_STATE(), "NV");
        $this->request->Set(GatewayRequest::BILLING_ZIPCODE(), "89141");
        $this->request->Set(GatewayRequest::BILLING_COUNTRY(), "US");

// Risk/Scrub Request Setting
        $this->request->Set(GatewayRequest::SCRUB(), "IGNORE");
        $this->request->Set(GatewayRequest::CVV2_CHECK(), "IGNORE");
        $this->request->Set(GatewayRequest::AVS_CHECK(), "IGNORE");

//
//	Perform the Purchase transaction.
//
        $this->assertTrue($this->service->PerformPurchase($this->request, $this->response));
    }
}
