<?php

namespace models;

class User extends DB
{
	public $name;
	public $id;
	public $email;
	public $status;
	public array $admissions;

	public function __construct($id)
	{
        parent::__construct();
        $res = $this->conn->query("SELECT * from users where id = '$id'");
        $row = $res->fetch_assoc();
        $this->name = $row['name'];
        $this->id = $row['id'];
        $this->status = $row['status'];
        $this->email = $row['email'];
				$this->admissions = $this->getAdmissions();
	}

	public function getAdmissions($id = null)
	{
        $q = "SELECT user_admissions.id as aid, `comment`, `edit`, `adding`, users.id as uid, name, email, finish_note FROM `user_admissions` join users on user_from = users.id where user_to = '$this->id'";
        if($id)
        {
            $q.=" AND user_from = '$id'";
        }
		$res = $this->conn->query($q);

        $adm = [];
		while($row = $res->fetch_assoc())
		{
			$adm[] = $row;
		}
		return $adm;
	}
    public function getAccesssedUsers($id = null)
    {
        $q = "SELECT user_admissions.id as aid, users.id as uid, `user_to`, `adding`, `edit`, `comment`, `name`, `email`, `add_note`, `comm_note` FROM `user_admissions` join users on user_to = users.id where user_from = '$this->id'";
        if($id)
        {
            $q.=" AND user_to = '$id'";
        }
        $res = $this->conn->query($q);
        $arr = [];
        while ($row = $res->fetch_assoc())
        {
            $arr[] = $row;
        }
        return $arr;
    }


    public function getSettings()
    {
        $res = $this->conn->query("SELECT * from user_settings where id = '{$this->id}'");
        if($res->num_rows > 0)
        {
            return $res->fetch_object();
        }
        return null;
    }

    public function  getChartsStatistics()
    {
        $rr = [];
        $res = $this->conn->query("SELECT * from (
    SELECT COUNT(*) as co, date(created_at) as date, status from tasks where status = 1 and datediff(CURRENT_TIMESTAMP, created_at) < 30 and responsible = '$this->id' GROUP BY created_at
UNION
SELECT   COUNT(*) as co, date(updated_at) as date, status from tasks where status = 2 and datediff(CURRENT_TIMESTAMP, updated_at) < 30 and responsible = '$this->id' GROUP BY updated_at
UNION
SELECT  COUNT(*) as co, date(finished_at) as date, status from tasks where status = 3 and datediff(CURRENT_TIMESTAMP, finished_at) < 30 and responsible = '$this->id' GROUP BY finished_at
) as s order by date");
        while($row = $res->fetch_object())
        {
            $rr[$row->date][$row->status] = $row;
        }
        $d = array();
        for($i = 0; $i < 30; $i++)
            $d[] = date("Y-m-d", strtotime('-'. $i .' days'));

        $stat = [];
        foreach($d as $date)
        {
            $stat[0][] = $rr[$date][1]->co ?: 0;
            $stat[1][] = $rr[$date][2]->co ?: 0;
            $stat[2][] = $rr[$date][3]->co ?: 0;
        }
        $stat[4] = $d;
        $stat[3] = max([max($stat[0]), max($stat[1]), max($stat[2])]);
        return $stat;
    }


}