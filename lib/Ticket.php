<?php

class Ticket{
    private $db;
    
    public function __construct(){
        $this->db = new Database();    
    }


    public function create_ticket($first_name, $last_name, $email, $date, $code, $sesId){
        $this->db->query("INSERT INTO tickets (first_name, last_name, email, event_date, code, session_id) values (:first_name, :last_name, :email, :event_date, :code, :session_id)");
        $this->db->bind(":first_name", $first_name,PDO::PARAM_STR);
        $this->db->bind(":last_name", $last_name, PDO::PARAM_STR);
        $this->db->bind(":email", $email, PDO::PARAM_STR);
        $this->db->bind(":code", $code, PDO::PARAM_STR);
        $this->db->bind(":event_date", $date, PDO::PARAM_STR);
        $this->db->bind(":session_id", $sesId, PDO::PARAM_STR);
        return $this->db->execute();
    }
    
    public function check_if_email_has_been_sended($email, $code){
        $this->db->query("SELECT * FROM tickets where email = :email and code = :code LIMIT 1");
        $this->db->bind(":email", $email, PDO::PARAM_STR);
        $this->db->bind(":code", $code, PDO::PARAM_STR);
        return $this->db->single();
    }

    public function get_tickets_by_customer($sesId){
        $this->db->query("SELECT * FROM tickets WHERE `session_id` = :sessId");
        $this->db->bind(':sessId', $sesId, PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    
    public function update_ticket_paid($sesId){
        $this->db->query("UPDATE tickets set betaald = 'true' WHERE `session_id` = :sessId");
        $this->db->bind(':sessId', $sesId, PDO::PARAM_STR);
        return $this->db->execute();
    }
}