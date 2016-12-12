<?php

use PHPUnit\Framework\TestCase;

class ATest extends TestCase {
    private $shop;

    public function setUp(){
        $this->shop = new BookShop();
    }

    public function test_something() {
        $this->shop->buy("Harry Potter and the Half-Blood Prince");

        self::assertEquals("Harry Potter and the Half-Blood Prince: 18 EUR

TOTAL: 18 EUR", $this->shop->getReceipt());
    }

    public function  test_more_than_three_books() {

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

    public function test_totale_all_inizio_e_zero()
    {
        self::assertEquals(0, $this->shop->getTotal());
    }

    public function test_il_totale_per_un_libro_è_18() {
        $this->shop->buy("Harry Potter and the Half-Blood Prince");
        self::assertEquals(18, $this->shop->getTotal());
    }

    public function test_il_totale_e_sempre_18() {
        $this->shop->buy("Harry Potter And The Goblet Of Fire");
        self::assertEquals(18, $this->shop->getTotal());
    }

    public function test_find_price() {
        /*
         * new Book("Harry Potter and the Half-Blood Prince",16.94),
            new Book("Harry Potter and the Chamber of Secrets", 17.26),
            new Book("Harry Potter And The Sorcerer's Stone", 12,70),
            new Book("Harry Potter And The Goblet Of Fire", 18.28),
            new Book("Harry Potter and the Order of the Phoenix", 18.29)
         */
        $shop = new BookShop();
        $price = $shop->findPrice("Harry Potter and the Half-Blood Prince");
        self::assertEquals(18.289999999999999, $price);
    }
}