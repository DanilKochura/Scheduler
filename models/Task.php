<?php

namespace models;

use DateTime;
use DateTimeZone;

class Task extends DB
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

	public function __construct()
	{
		parent::__construct();
	}

	public function add($title, $responsible, $text = '', $priority=5)
	{
			$uid = $_SESSION['user'];

			$this->title= $title;
			$this->responsibile= $responsible;
			$this->text= $text;
			$this->priority= $priority;
			$this->status= self::NEW;
			$this->status= self::NEW;
			$this->conn->query("INSERT INTO tasks (`responsible`,`created_by`, `title`, `text`, `status`, `priority`, `time`) values('$responsible','$uid', '$title','$text', ".self::NEW.", '$priority', 0)");
            $this->id = $this->conn->insert_id;
	}


	public function save()
	{

        $this->conn->query("UPDATE `tasks` SET `responsible`='{$this->responsibile}',`created_by` = '$this->created_by', `title`='$this->title',`text`='$this->text',`status`='$this->status',`priority`='$this->priority' WHERE id = '$this->id'");
	}

    public function get($id): Task
		{

        $res = $this->conn->query("SELECT * FROM tasks where id = '$id'");
        $row = $res->fetch_assoc();
        $this->text = $row['text'] ?: '';
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->created_by = $row['created_by'];
        $this->responsibile = $row['responsible'];
        $this->status = $row['status'];
        $this->time = new \DateTime($row['time'], new DateTimeZone('Europe/Moscow'));
        $this->created_at = new \DateTime($row['created_at'], new DateTimeZone('Europe/Moscow'));
        $this->updated_at = new \DateTime($row['updated_at'], new DateTimeZone('Europe/Moscow'));
        $this->finished_at = new \DateTime($row['finished_at'], new DateTimeZone('Europe/Moscow'));
        if($row['created_by'] != $row['responsible'])
        {
            $this->created_by = $row['created_by'];
            $res1 = $this->conn->query("SELECT `name`, `email` from users where id = '{$row['created_by']}'");
            if($res1->num_rows)
            {
                $user = $res1->fetch_object();
                $this->author = $user->name; //." (".$user->email.")"
            }
        }
        $this->priority = $row['priority'];
				return $this;


    }

	public function getComments(): Task
	{
		$res = $this->conn->query("SELECT * FROM `comments` join users on user_id=users.id WHERE task_id = '$this->id'");
		$comm = [];
		if($res->num_rows > 0)
		{
			while ($row = $res->fetch_assoc())
			{
				$arr = [];
				$arr['text'] = $row['text'];
				$arr['created_at'] = new \DateTime($row['created_at'], new DateTimeZone('Europe/Moscow'));
				$arr['user_name'] = $row['name'];
				$comm[] = $arr;
			}
		}
		$this->comments = $comm;
		return $this;

	}

	public function __destruct()
	{
		parent::__destruct();
	}


}