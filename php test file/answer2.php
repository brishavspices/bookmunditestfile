<?php

class PriceFilter
{
    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function filterByPrice($threshold)
    {
        $filteredItems = array_filter($this->items, function($item) use ($threshold) {
            return $item['price'] > $threshold;
        });

        return $filteredItems;
    }

    public function getTotalPrice($filteredItems)
    {
        $totalPrice = array_reduce($filteredItems, function($sum, $item) {
            return $sum + $item['price'];
        }, 0);

        return $totalPrice;
    }
}

// Sample array of IDs and prices
$items = [
    ['id' => 1, 'price' => 10],
    ['id' => 2, 'price' => 20],
    ['id' => 3, 'price' => 30],
    ['id' => 4, 'price' => 40],
    ['id' => 5, 'price' => 50],
];

// Create PriceFilter instance
$priceFilter = new PriceFilter($items);

// Filter items based on a threshold
$threshold = 30;
$filteredItems = $priceFilter->filterByPrice($threshold);

// Output the filtered items
echo "Filtered Items:\n";
print_r($filteredItems);

// Get the total price from the filtered items
$totalPrice = $priceFilter->getTotalPrice($filteredItems);

// Output the total price
echo "Total Price: $totalPrice";
