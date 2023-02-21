<?php

namespace models;

class DeskSettings extends DB
{
    public bool $new = false;
    public ?int $id;
    public string $picture = '';
    public int $theme = 0;
    public int $deadlines = 0;
    public int $filled = 0;


    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        $this->id = $id;
        $res = $this->conn->query("SELECT * from user_settings where id = '{$id}'");
        if($res->num_rows >0)
        {
            $row = $res->fetch_object();
            $this->picture = $row->picture;
            $this->theme = $row->theme;
            $this->deadlines = $row->deadlines;
            $this->filled = $row->filled_tasks;
        } else
        {
            $this->new = true;
        }
    }

    public function save()
    {
        if(!$this->new)
        {
            $this->conn->query("UPDATE user_settings set picture = '{$this->picture}', theme = '{$this->theme}', deadlines = '$this->deadlines', filled_tasks = '$this->filled' where id = '{$this->id}'");
            die();
        }
        $this->conn->query("INSERT INTO `user_settings`(`id`, `picture`, `theme`, `deadlines`, `filled_tasks`) values('$this->id', '$this->picture', '$this->theme', '$this->deadlines', '$this->filled')");
    }
}