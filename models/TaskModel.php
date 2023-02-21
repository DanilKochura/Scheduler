<?php

namespace models;

use DateTime;

class TaskModel
{
    public const NEW = 1;
    public const WORK = 2;
    public const ENDED = 3;

    public int $id;
    public string $title;
    public string $text;
    public string $author;
    public int $responsibile;
    public int $status;
    public int $created_by;
    public DateTime $time;
    public DateTime $created_at;
    public DateTime $updated_at;
    public DateTime $finished_at;
    public array $comments;

    public int $priority;

    public bool $frozen;

    public function __construct()
    {
        
    }
}