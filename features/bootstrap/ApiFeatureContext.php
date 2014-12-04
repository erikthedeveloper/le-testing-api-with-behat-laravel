<?php

use Behat\WebApiExtension\Context\WebApiContext;

class ApiFeatureContext extends WebApiContext
{

    /**
     * @Given /^the response json should have a "([^"]*)" key$/
     */
    public function theResponseJsonShouldHaveAKey($key_name)
    {
        PHPUnit_Framework_Assert::assertArrayHasKey($key_name, $this->response->json());
    }

    /**
     * @Given /^the response json's "([^"]*)" key should be of type "([^"]*)"$/
     */
    public function theResponseJsonSKeyShouldBeOfType($key_name, $desired_type)
    {
        PHPUnit_Framework_Assert::assertAttributeInternalType($desired_type, $key_name, (object) $this->response->json());
    }
}