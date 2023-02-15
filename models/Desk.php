<?php

namespace models;

use DateTimeZone;
use Exception;

class Desk extends DB
{
	public array $new;
	public array $work;
	public array $done;
	public bool $edit = true;
	public bool $comment = true;
	public bool $add = true;


	public function __construct($id)
	{
		parent::__construct();

		$tasks = [];
		foreach ([Task::NEW, Task::WORK, Task::ENDED] as $type)
		{
			$res = $this->conn->query("SELECT * from tasks where status = '$type' and responsible = '$id' order by priority desc");

			if($res->num_rows > 0)
			{
				while($row = $res->fetch_assoc())
				{
					$task = new Task();
					$task->text = $row['text'] ?: '';
					$task->id = $row['id'];
					$task->title = $row['title'];
					$task->responsibile = $row['responsible'];
					$task->status = $row['status'];
					$task->time = new \DateTime($row['time'], new DateTimeZone('Europe/Moscow'));
					$task->created_at = new \DateTime($row['created_at'], new DateTimeZone('Europe/Moscow'));
					$task->updated_at = new \DateTime($row['updated_at'], new DateTimeZone('Europe/Moscow'));
					$task->finished_at = new \DateTime($row['finished_at'], new DateTimeZone('Europe/Moscow'));
					$task->priority = $row['priority'];
					$diff = (new \DateTime('now', new DateTimeZone('Europe/Moscow')))->diff($task->created_at);
                    if($row['created_by'] != $_SESSION['user'])
                    {
                        $res1 = $this->conn->query("SELECT `name`, `email` from users where id = '{$_SESSION['user']}'");
                        $user = $res1->fetch_object();
                        $task->author = $user->name; //." (".$user->email.")"
                    }
					$tasks[$type][] = $task;



				}

			}
			else{
				$tasks[$type] = [];
			}


		}
		$this->new = $tasks[1];
		$this->work = $tasks[2];
		$this->done = $tasks[3];


		$uid = $_SESSION['user'];
		if($uid != $id)
		{
			$res = $this->conn->query("SELECT adding, edit, comment from user_admissions where user_from = '$id' and user_to = '$uid'");
			if($res->num_rows < 0)
			{
				throw new Exception();
			}
			$row = $res->fetch_assoc();
			$this->add = $row['adding'] ? true : false;
			$this->edit = $row['edit'] ? true : false;
			$this->comment = $row['comment'] ? true : false;
		}

	}



}