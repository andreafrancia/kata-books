<?php

use PHPUnit\Framework\TestCase;

class ATest extends TestCase {
    private $shop;

    public function test_something() {
        $this->shop = new BookShop();

        $this->shop->buy("Harry Potter and the Half-Blood Prince");

        self::assertEquals("Harry Potter and the Half-Blood Prince: 18 EUR

TOTAL: 18 EUR", $this->shop->getReceipt());
    }

    public function  test_more_than_three_books() {
        $this->shop = new BookShop();

        $this->shop->buy("Harry Potter and the Half-Blood Prince");
        $this->shop->buy("Harry Potter and the Half-Blood Prince");
        $this->shop->buy("Harry Potter and the Half-Blood Prince");
        $this->shop->buy("Harry Potter and the Half-Blood Prince");

        self::assertEquals('Harry Potter and the Half-Blood Prince: 18 EUR
Harry Potter and the Half-Blood Prince: 18 EUR
Harry Potter and the Half-Blood Prince: 18 EUR
Harry Potter and the Half-Blood Prince: 18 EUR

TOTAL: 57.6 EUR', $this->shop->getReceipt());
    }
}