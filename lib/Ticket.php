<?php

class Ticket{
    private $db;
    
    public function __construct(){
        $this->db = new Database();    
    }


    public function create_ticket($first_name, $last_name, $email, $date, $code, $sesId){
        $this->db->query("INSERT INTO tickets (first_name, last_name, email, event_date, code, session_id) values (:first_name, :last_name, :email, :event_date, :code, :session_id)");
        $this->db->bind(":first_name", $first_name);
        $this->db->bind(":last_name", $last_name);
        $this->db->bind(":email", $email);
        $this->db->bind(":code", $code);
        $this->db->bind(":event_date", $date);
        $this->db->bind(":session_id", $sesId);
        return $this->db->execute();
    }
    
    public function check_if_email_has_been_sended($email, $code){
        $this->db->query("SELECT * FROM tickets where email = :email and code = :code LIMIT 1");
        $this->db->bind(":email", $email);
        $this->db->bind(":code", $code);
        return $this->db->single();
    }

    public function get_tickets_by_customer($sesId){
        $this->db->query("SELECT * FROM tickets WHERE `session_id` = :sessId");
        $this->db->bind(':sessId', $sesId);
        return $this->db->resultSet();
    }
    
    public function update_ticket_paid($sesId){
        $this->db->query("UPDATE tickets set betaald = 'true' WHERE `session_id` = :sessId");
        $this->db->bind(':sessId', $sesId);
        return $this->db->execute();
    }
}