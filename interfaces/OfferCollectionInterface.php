<?php

namespace kilo;

interface OfferCollectionInterface
{
    public function get(string $response, $filter): int;
    public function countProducts($filter): int;
}


