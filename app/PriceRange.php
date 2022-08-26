<?php

namespace kilo;

class PriceRange implements OfferCollectionInterface
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
        foreach ($this->response as $key => $product) {
            if ($product['price'] >= $filter[1] && $product['price'] <= $filter[2]) 
            {
                $this->products[] = $key;
            }
        };

        return count($this->products);
    }
}
