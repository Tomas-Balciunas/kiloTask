<?php

namespace kilo;

include_once('logging.php');

class PriceRange implements OfferCollectionInterface
{
    private $response;
    private $products = array();
    private $result;
    public static $endp = "api/v1/objects";

    public function get(string $response, $args)
    {
        if (is_numeric($args[1]) && is_numeric($args[2]) && $args[1] <= $args[2]) {
            $this->response = json_decode($response, true);
            $this->result = $this->countProducts($args);

            $msg = "Successfully executed command <" . $args[0] . "> <" . $args[1] . "> <" . $args[2] . ">. Result: " . $this->result;
            logger($msg);

            return "Amount of products found: " . $this->result;
        } else {
            $msg = "Failed command <" . $args[0] . "> <" . $args[1] . "> <" . $args[2] . ">.";
            logger($msg);

            return "Incorrect parameters given.";
        }
    }

    public function countProducts($args): int
    {
        foreach ($this->response as $key => $product) {
            if ($product["price"] >= $args[1] && $product["price"] <= $args[2]) 
            {
                $this->products[] = $key;
            }
        };

        return count($this->products);
    }
}
