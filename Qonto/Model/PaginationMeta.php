<?php

namespace neyric\Qonto\Model;

class PaginationMeta
{
    public int $current_page;

    public ?int $next_page;

    public ?int $prev_page;

    public int $total_pages;

    public int $total_count;

    public int $per_page;
}