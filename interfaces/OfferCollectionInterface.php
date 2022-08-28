<?php

namespace kilo;

interface OfferCollectionInterface
{
    public function get(string $response, $args);
    public function countProducts($args): int;
}


