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

        $xml = simplexml_load_file('commands.xml');

        foreach ($xml as $e) {
            if (!in_array($this->commands[0], json_decode(json_encode($e->comm), true)))
                continue;
            $classXml = (array) $e->attributes()->classname;
            $class = $classXml[0];

            $result = new Command(new Fetch($this->url));
            return $result->initiateCommand($this->commands, $class);
        }

        echo "Command " . $this->commands[0] . " not found.";


        // if ($this->validate()) {
        //     $comm = new Command(new Fetch($this->url));
        //     return call_user_func(array($comm, $this->commands[0]), $this->commands);
        // } else {
        //     return "Unknown command <" . $this->commands[0] . ">. Available commands: <count_by_price_range> <min price> <max price> | <count_by_vendor_id> <vendor id>";
        // }
    }

    // public function validate()
    // {
    //     return method_exists(Command::class, $this->commands[0]);
    // }
}
