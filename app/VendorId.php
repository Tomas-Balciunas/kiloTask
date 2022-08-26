<?php

namespace kilo;

class VendorId implements OfferCollectionInterface
{
    private $response;
    private $products = array();
    private $result;

    public function get(string $response, $filter): int
    {
        $this->response = json_decode($response, true);
        $this->result = $this->countProducts($filter);
        return $this->result;
    }

    public function countProducts($filter): int
    {
        foreach($this->response as $key => $product) {
            $product["vendorId"] != $filter[1] ?: $this->products[] = $key;
        };

        return count($this->products);
    }
}
