<?php

class BookShop {
    private $DISCOUNT_EVERY_THREE_BOOKS = 20/100;

    public function __construct()
    {
        $this->books = array(
            new Book("Harry Potter and the Half-Blood Prince",16.94),
            new Book("Harry Potter and the Chamber of Secrets", 17.26),
            new Book("Harry Potter And The Sorcerer's Stone", 12,70),
            new Book("Harry Potter And The Goblet Of Fire", 18.28),
            new Book("Harry Potter and the Order of the Phoenix", 18.29)
        );
        $this->orderTotal = 0.0;
        $this->totalBooks = 0;
        $this->receipt = '';
    }

    public function buy($title) {
        $price = 0;
        $this->receipt .= "$title";
        for($i=0; $i<sizeof($this->books); $i++) {
            if($title = $this->books[$i]->getTitle()) {
                $price = $this->books[$i]->getFullPrice();
            }
        }
        $price = sprintf("%2.2d", $price);
        $this->receipt .= ": $price EUR\n";
        $this->orderTotal+=$price;
        $this->totalBooks++;
        if($this->totalBooks > 3) {
            $this->orderTotal=$this->orderTotal-$price+$price*$this->DISCOUNT_EVERY_THREE_BOOKS;
        }
    }

    private function getTotal() {
        return $this->orderTotal;
    }

    public function getReceipt() {
        $total = $this->getTotal();
        return "$this->receipt\nTOTAL: $total EUR";
    }
}

