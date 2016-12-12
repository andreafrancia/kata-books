<?php

use PHPUnit\Framework\TestCase;

class ATest extends TestCase {
    public function test_something() {
        $shop = new BookShop();
        $shop->buy("Harry Potter and the Half-Blood Prince");
        self::assertEquals("Harry Potter and the Half-Blood Prince: 18 EUR

TOTAL: 18 EUR", $shop->getReceipt());
    }
}