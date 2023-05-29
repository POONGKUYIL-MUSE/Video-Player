<?php

class VP_API {

    private $projects_table = "projects";
    private $screens_table = "screens";
    public $id;
    public $project_id;
    public $project_title;
    public $project_desc;
    public $project_screens = [];
    public $createdat; 
    public $createdby=1; 
    public $updatedat; 
    public $updatedby=1; 
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }	

    function create_project(){
		
		$this->project_title = htmlspecialchars(strip_tags($this->project_title));
		$this->project_desc = htmlspecialchars(strip_tags($this->project_desc));
		$this->createdat = htmlspecialchars(strip_tags($this->createdat));
		$this->createdby = htmlspecialchars(strip_tags($this->createdby));
		$this->updatedat = htmlspecialchars(strip_tags($this->updatedat));
		$this->updatedby = htmlspecialchars(strip_tags($this->updatedby));
		$this->project_screens = $this->project_screens;

        $sql = "INSERT INTO ".$this->projects_table ." (project_title, project_desc, createdat, createdby, updatedat, updatedby) VALUES ('$this->project_title', '$this->project_desc', '$this->createdat', $this->createdby, '$this->updatedat', $this->updatedby)";
        if ($this->conn->query($sql) === TRUE) {
            $last_id = $this->conn->insert_id;

            if (!empty($last_id)) {
                
                $done = 0;
                for ($i=0; $i<count($this->project_screens); $i++) {
                    $screen_name = $this->project_screens[$i];
                    $sql = "INSERT INTO ".$this->screens_table ." (project_id, screen_name, createdat, createdby, updatedat, updatedby) VALUES ($last_id, '$screen_name', '$this->createdat', $this->createdby, '$this->updatedat', $this->updatedby)";
                    if ($this->conn->query($sql) === TRUE) {
                        $done = $done + 1;
                    }
                }

                if ($done == count($this->project_screens)) {
                    return true;
                }
            }
		}

        return false;
        
	}

    function read_project() {
        $this->project_id = htmlspecialchars(strip_tags($this->project_id));
        $sql = "SELECT id as project_id, project_title, project_desc FROM ".$this->projects_table. " WHERE id=".$this->project_id;
        $result = $this->conn->query($sql);
        if ($result->num_rows>0) {
            $data = $result->fetch_assoc();
            $sql = "SELECT id as screen_id, project_id, screen_name FROM ".$this->screens_table. " WHERE project_id = ".$this->project_id . " order by screen_name asc";
            $res = $this->conn->query($sql);
            if ($res->num_rows>0) {
                $data['screens'] = [];
                $data['screens_len'] = $res->num_rows;
                while($row = $res->fetch_assoc()) {
                    array_push($data['screens'],$row);
                }
            }
            return $data;
        }
        return [];
    }
}