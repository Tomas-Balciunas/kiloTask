<?php

namespace kilo;

include_once('logging.php');

class Command extends Controller
{
    public function __construct($response)
    {
        $this->response = $response;
    }

    public function count_by_price_range($args)
    {
        if (is_numeric($args[1]) && is_numeric($args[2]) && $args[1] <= $args[2]) {
            $data = new PriceRange();
            $this->count = $data->get($this->response, $args);
            $msg = "Successfully executed command <" . $args[0] . "> <" . $args[1] . "> <" . $args[2] . ">. Result: " . $this->count;
            logger($msg);

            return "Amount of products found: " . $this->count;
        } else {
            $msg = "Failed command <" . $args[0] . "> <" . $args[1] . "> <" . $args[2] . ">.";
            logger($msg);

            return "Incorrect parameters given.";
        }
    }

    public function count_by_vendor_id($args)
    {
        if (ctype_digit($args[1])) {
            $data = new VendorId();
            $this->count = $data->get($this->response, $args);
            $msg = "Successfully executed command <" . $args[0] . "> <" . $args[1] . ">. Result: " . $this->count;
            logger($msg);

            return "Amount of products found: " . $this->count;
        } else {
            $msg = "Failed command <" . $args[0] . "> <" . $args[1] . ">.";
            logger($msg);

            return "Incorrect parameter given.";
        }
    }
}
