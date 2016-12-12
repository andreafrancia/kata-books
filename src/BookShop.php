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
        $price = $this->findPrice($title);

        $pricef = sprintf("%2.2d", $price);
        $this->receipt .= ": $pricef EUR\n";
        $this->orderTotal+=$pricef;
        $this->totalBooks++;
        if($this->totalBooks > 3) {
            $this->orderTotal=$this->orderTotal-$pricef+$pricef*$this->DISCOUNT_EVERY_THREE_BOOKS;
        }
    }

    public function getTotal() {
        return $this->orderTotal;
    }

    public function getReceipt() {
        $total = $this->getTotal();
        return "$this->receipt\nTOTAL: $total EUR";
    }

    public function findPrice($title)
    {
        $price = 0;
        $this->receipt .= "$title";
        for ($i = 0; $i < sizeof($this->books); $i++) {
            if ($title = $this->books[$i]->getTitle()) {
                $price = $this->books[$i]->getFullPrice();
            }
        }
        return $price;
    }
}

