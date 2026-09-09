<?php

class MovieTicket
{
    public $movieName;
    public $seatNumber;
    public $price;

    public function __construct($movieName, $seatNumber, $price)
    {
        $this->movieName = $movieName;
        $this->seatNumber = $seatNumber;
        $this->price = $price;
    }

    public function displayTicket()
    {
        echo "Movie: " . $this->movieName . "<br>";
        echo "Seat: " . $this->seatNumber . "<br>";
        echo "Price: ₹" . $this->price . "<br>";
    }

    public function __destruct()
    {
        echo "Ticket for " . $this->movieName .
             " seat " . $this->seatNumber .
             " is released.";
    }
}

$ticket = new MovieTicket("Avengers", "A12", 250);

$ticket->displayTicket();

?>
