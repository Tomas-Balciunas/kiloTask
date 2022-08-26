<?php

namespace kilo;

class Controller
{
    private $url = "https://63035ab29eb72a839d7e946f.mockapi.io/";
    private $endpoint = "api/v1/objects";
    private $commands;
    private $response;
    protected $count;

    public function __construct($argv)
    {
        $this->commands = $argv;
    }

    public function fetch()
    {
        $request = new Fetch($this->url);
        $this->response = $request->read($this->endpoint);

        if (!$this->response) {
            echo "Fetching data failed. Refer to log.txt for more info.";
        } else {
            if ($this->validate()) {
                $test = new Command($this->response);
                return call_user_func(array($test, $this->commands[0]), $this->commands);
            } else {
                return "Unknown command <" . $this->commands[0] . ">. Available commands: <count_by_price_range> <min price> <max price> | <count_by_vendor_id> <vendor id>";
            }
        }
    }

    public function validate()
    {
        return method_exists(Command::class, $this->commands[0]);
    }
}
