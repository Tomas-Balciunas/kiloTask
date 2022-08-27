<?php

namespace kilo;

class Execute
{
    private $url = "https://63035ab29eb72a839d7e946f.mockapi.io/";
    private $commands;
    protected $count;

    public function __construct($argv)
    {
        $this->commands = $argv;
    }

    public function callCommand()
    {
        if ($this->validate()) {
            $comm = new Command(new Fetch($this->url));
            return call_user_func(array($comm, $this->commands[0]), $this->commands);
        } else {
            return "Unknown command <" . $this->commands[0] . ">. Available commands: <count_by_price_range> <min price> <max price> | <count_by_vendor_id> <vendor id>";
        }
    }

    public function validate()
    {
        return method_exists(Command::class, $this->commands[0]);
    }
}
