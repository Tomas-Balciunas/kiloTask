<?php

namespace kilo;

class Command extends Execute
{
    private $response;

    public function __construct($fetch)
    {
        $this->fetch = $fetch;
    }

    private function fetch($endp) {
        $this->response = $this->fetch->read($endp);
    }

    public function initiateCommand($args, $class) {
        $getClass = "kilo\\".$class;
        $classEndp = $getClass::$endp;
        $this->fetch($classEndp);

        if (!$this->response) {
            return "Fetching data failed. Refer to log.txt for more info.";
        } else {
            $data = new $getClass();
            return $data->get($this->response, $args);
        }
    }
}
