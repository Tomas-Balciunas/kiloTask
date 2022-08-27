<?php

namespace kilo;

interface OfferCollectionInterface
{
    public function get(string $response, $args): int;
    public function countProducts($args): int;
}


