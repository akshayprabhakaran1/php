<?php

class Pagenator {
    public $limit;
    public $offset;
    public $previous;
    public $next;
    public $total_pages;
    public function __construct($page, $record_per_page, $total_record = 100){

        $this -> limit = $record_per_page;

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            "options" => [
                "default" => 1,
                "min_range" => 1
            ]
        ]);

        if ($page > 1) {
            $this -> previous = $page - 1;
        }

        $total_pages = ceil($total_record / $record_per_page);

        $this -> total_pages = $total_pages;

        if ($page < $total_pages) {
            $this -> next = $page + 1;
        }


        $this -> offset = $record_per_page * ($page - 1);
    }
}