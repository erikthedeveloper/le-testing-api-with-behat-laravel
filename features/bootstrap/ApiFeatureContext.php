<?php

use Behat\WebApiExtension\Context\WebApiContext;

use Illuminate\Database\Capsule\Manager as DB;
use League\FactoryMuffin\Facade as FactoryMuffin;


class ApiFeatureContext extends WebApiContext
{

    /**
     * @BeforeSuite
     */
    public static function bootstrapSuite()
    {

        echo "- - - - - - Boot App, Database, and Muffin Factory. Yum! - - - - - - ";

        $unitTesting     = true;
        $testEnvironment = 'testing';

        $app = require_once __DIR__ . '/../../bootstrap/start.php';
        $app->boot();

        $path = Config::get('database.connections.sqlite.database');
        if (file_exists($path)) {
            unlink($path);
        }
        touch($path);

        Artisan::call('migrate:install');

        FactoryMuffin::loadFactories(__DIR__ . '/../../tests/factories');

    }

    /**
     * @AfterSuite
     */
    public static function tearDown() {
        echo "- - - - - - Tear it Down! - - - - - - ";
        $path = Config::get('database.connections.sqlite.database');
        unlink($path);
    }

    /**
     * @BeforeScenario
     */
    public static function refreshDatabase() {
        Artisan::call('migrate:refresh');
    }

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

    /**
     * @Given /^there are (\d+) "([^"]*)"s$/
     */
    public function thereAreSomeNumberOfModel($num, $model_name)
    {
        FactoryMuffin::seed($num, $model_name);
    }

    /**
     * @Given /^the "([^"]*)" with id (\d+) has attributes:$/
     */
    public function theWithIdHasAttributes($model_name, $model_id, \Behat\Gherkin\Node\PyStringNode $jsonString)
    {
        $attributes = json_decode($this->replacePlaceHolder($jsonString->getRaw()), true);
        $model_name::findOrFail($model_id)->update($attributes);
    }
}