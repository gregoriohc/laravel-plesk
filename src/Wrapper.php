<?php

namespace Gregoriohc\LaravelPlesk;

use Illuminate\Config\Repository;
use PleskX\Api\Client;

class Wrapper
{
    /**
     * The config instance
     *
     * @var Repository
     */
    public $config;

    /**
     * The Plesk api client instance
     *
     * @var \PleskX\Api\Client
     */
    public $client;

    /**
     * Client constructor
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        // Get the config data
        $this->config = $config;

        // Make the client instance
        $this->client = new Client($this->config->get('plesk.host'));
        $this->client->setCredentials($this->config->get('plesk.login'), $this->config->get('plesk.password'));
    }

    /**
     * Handle dynamic calls to the client
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->client, $name], $arguments);
    }
}