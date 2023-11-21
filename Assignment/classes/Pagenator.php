<?php

/**
 * Summary of Pagenator
 * Used to provide calculations for pagenation management
 */
class Pagenator {
    public $limit;
    public $offset;
    public $previous;
    public $next;
    public $current_page;
    public $total_pages;

    /**
     * Summary of __construct
     * @param integer $page page number 
     * @param integer $record_per_page offset value
     * @param integer $total_record total number of records retrived from db
     */
    public function __construct($page, $record_per_page, $total_record = 100){

        $this -> limit = $record_per_page;

        //! filer the page variable and check if integer is given 
        //! else provide with 1 as default value
        //! to avoid the giving of negative number we provide with a min_range = 1
        $page = filter_var($page, FILTER_VALIDATE_INT, [
            "options" => [
                "default" => 1,
                "min_range" => 1
            ]
        ]);

        $this -> current_page = $page;

        //! calculating the previous page
        if ($page > 1) {
            $this -> previous = $page - 1;
        }

        $total_pages = ceil($total_record / $record_per_page);

        $this -> total_pages = $total_pages;

        //! calculating the next page
        if ($page < $total_pages) {
            $this -> next = $page + 1;
        }

        $this -> offset = $record_per_page * ($page - 1);
    }
}