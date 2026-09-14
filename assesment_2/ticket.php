<?php

class Ticket
{
    private $id;
    private $title;
    private $status;
    private $assignedTo;
    private $date;

    public function __construct(
        $id,
        $title,
        $status,
        $assignedTo,
        $date
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->status = $status;
        $this->assignedTo = $assignedTo;
        $this->date = $date;
    }

    public function toArray()
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "status" => $this->status,
            "assignedTo" => $this->assignedTo,
            "date" => $this->date
        ];
    }
}

?>