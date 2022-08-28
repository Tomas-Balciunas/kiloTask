<?php

namespace kilo;

class VendorId implements OfferCollectionInterface
{
    private $response;
    private $products = array();
    private $result;
    public static $endp = "api/v1/objects";

    public function get(string $response, $args)
    {
        if (ctype_digit($args[1])) {
            $this->response = json_decode($response, true);
            $this->result = $this->countProducts($args);
            
            $msg = "Successfully executed command <" . $args[0] . "> <" . $args[1] . ">. Result: " . $this->result;
            logger($msg);

            return "Amount of products found: " . $this->result;
        } else {
            $msg = "Failed command <" . $args[0] . "> <" . $args[1] . ">.";
            logger($msg);

            return "Incorrect parameter given.";
        }
    }

    public function countProducts($args): int
    {
        foreach ($this->response as $key => $product) {
            $product["vendorId"] != $args[1] ?: $this->products[] = $key;
        };

        return count($this->products);
    }
}
