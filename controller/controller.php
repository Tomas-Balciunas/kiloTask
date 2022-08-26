<?php

namespace kilo;

class Controller
{
    private $url = 'https://63035ab29eb72a839d7e946f.mockapi.io/';
    private $endpoint = '/api/v1/objects';
    private $commands;
    private $response;
    private $count;

    public function __construct($argv)
    {
        $this->commands = $argv;
    }

    public function fetch()
    {
        $request = new Fetch($this->url);
        $this->response = $request->read($this->endpoint);
        if ($this->validate()) {
            return call_user_func(array($this, $this->commands[0]), $this->commands);
        } else {
            return "Unknown command <" . $this->commands[0] . ">. Available commands: <count_by_price_range> <min price> <max price> | <count_by_vendor_id> <vendor id>";
        }
    }

    public function count_by_price_range($args)
    {
        $data = new PriceRange();
        $this->count = $data->get($this->response, $args);
        return "Amount of products found: " . $this->count;
        
    }

    public function count_by_vendor_id($args)
    {
        $data = new VendorId();
        $this->count = $data->get($this->response, $args);
        return "Amount of products found: " . $this->count;
    }

    public function validate()
    {
        return method_exists(Controller::class, $this->commands[0]);
    }
}
