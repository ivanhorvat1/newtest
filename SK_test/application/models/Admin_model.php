<?php

class Admin_Model extends CI_Model
{
    //get all clients data
    public function get_client_list()
    {
        $query = $this->db->select('*')
            ->from('user')
            ->get();
        return $query->result_array();
    }

    //get selected client data
    public function find_client($id)
    {
        $query = $this->db->select('*')
            ->where('user_id',$id)
            ->get('user');
        return $query->row();
    }

    //store client
    public function addClient($array)
    {
        $this->db->insert('user', $array);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //update client
    public function updateClient($id, array $post)
    {
        $this->db->where('user_id', $id)
                ->update('user', $post);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //delete client
    public function delete_client($id)
    {
        $this->db->delete('user',['user_id'=>$id]);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //delete client and invoice
    public function delete_client_invoice($id)
    {
        $sql="DELETE user, invoice 
              FROM user
              INNER JOIN invoice 
              ON invoice.user_id = user.user_id
              WHERE invoice.user_id = $id and user.user_id = $id";
        $this->db->query($sql);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //store invoice
    public function addInvoice($array)
    {
        $this->db->insert('invoice', $array);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //get all invoices data
    public function get_invoice_list()
    {
        $query = $this->db->select('*')
            ->from('invoice')
            ->get();
        return $query->result_array();
    }

    //get selected invoice data
    public function find_invoice($id)
    {
        $query = $this->db->select('*')
            ->where('invoice_id',$id)
            ->get('invoice');
        return $query->row();
    }

    //update invoice
    public function updateInvoice($id,$post)
    {
        $this->db->where('invoice_id', $id)
                ->update('invoice', $post);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //delete invoice
    public function delete_invoice($id){
        $this->db->delete('invoice',['invoice_id'=>$id]);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}