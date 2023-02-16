<?php

namespace models;

use DateTimeZone;

class TaskService extends DB
{
	public array $tasks;

	public function __construct()
	{
		parent::__construct();
	}

	public function get($resp): array
	{
        $tasks = [];
        foreach ([Task::NEW, Task::WORK, Task::ENDED] as $type)
        {
            $res = $this->conn->query("SELECT * from tasks where status = '$type' and responsible = '$resp' order by priority desc");

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


                    $tasks[$type][] = $task;



                }

            }
            else{
                $tasks[$type] = [];
            }


        }
      	return $tasks;
	}


    public function getFinishedMonth($id)
    {
        $tasks = [];
        $res = $this->conn->query("SELECT title, date(created_at) as created_at, date(finished_at) as finished_at, created_by, priority from tasks where responsible = '$id' and datediff(CURRENT_TIMESTAMP, finished_at) < 30");
        while($row = $res->fetch_object())
        {
            $row->created_by = (new User($row->created_by))->name;
            $tasks[] = $row;
        }
        return $tasks;

    }
}