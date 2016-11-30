<?php

class Book {

    /**
     * Book constructor.
     * @param string $title
     * @param float $fullPrice
     */
    public function __construct($title, $fullPrice)
    {
        $this->title = $title;
        $this->fullPrice = $fullPrice;
    }


    /**
     * @var string
     */
    private $title;

    /**
     * @var double
     */
    private $fullPrice;

    /**
     * @return float
     */
    public function getFullPrice()
    {
        return $this->fullPrice;
    }

    /**
     * @param float $fullPrice
     */
    public function setFullPrice($fullPrice)
    {
        $this->fullPrice = $fullPrice;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}