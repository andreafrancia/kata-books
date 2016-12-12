<?php

use PHPUnit\Framework\TestCase;

class ATest extends TestCase {
    public function test_something() {
        $shop = new BookShop();
        $shop->buy("Harry Potter and the Half-Blood Prince");
        self::assertEquals("Harry Potter and the Half-Blood Prince: 18 EUR

TOTAL: 18 EUR", $shop->getReceipt());
    }

    public function  test_more_than_three_books() {
        $shop = new BookShop();

        $shop->buy("Harry Potter and the Half-Blood Prince");
        $shop->buy("Harry Potter and the Half-Blood Prince");
        $shop->buy("Harry Potter and the Half-Blood Prince");
        $shop->buy("Harry Potter and the Half-Blood Prince");

        self::assertEquals('Harry Potter and the Half-Blood Prince: 18 EUR
Harry Potter and the Half-Blood Prince: 18 EUR
Harry Potter and the Half-Blood Prince: 18 EUR
Harry Potter and the Half-Blood Prince: 18 EUR

TOTAL: 57.6 EUR', $shop->getReceipt());
    }
}