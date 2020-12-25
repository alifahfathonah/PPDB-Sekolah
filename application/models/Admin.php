<?php

class Admin extends CI_Model
{

  protected $data;
  protected $where;

  protected $table = "admin";

  // Setters
  public function setData($data)
  {
    $this->data = $data;
    return $this;
  }

  public function setWhere($data)
  {
    $this->where = $data;
    return $this;
  }


  // Queries Builder
  public function getAll()
  {
    $query = $this->db
      ->from($this->table)
      ->get();

    return $query->result();
  }

  public function get($select = null, $group = null, $orderby = null)
  {
    $query = $this->db
      ->select($select ? $select : "*")
      ->from($this->table)
      ->where($this->where);

    if ($group) $this->db->group_by($group);
    if ($orderby) $this->db->order_by($orderby);
    return $query->get()->result();
  }

  public function getOne($select = null, $group = null, $orderby = null)
  {
    $query = $this->db
      ->select($select ? $select : "*")
      ->from($this->table)
      ->where($this->where);


    if ($group) $this->db->group_by($group);
    if ($orderby) $this->db->order_by($orderby);
    return $query->get()->row();
  }

  public function check($data)
  {
    $select = 'id, username, password, role';
    $query = $this->db
      ->select($select)
      ->get_where('admin', $data);

    return $query->row();
  }

  public function insert()
  {
    $this->db->insert('admin', $this->data);
    return $this->db->insert_id();
  }

  public function update()
  {
    return $this->db->update('admin', $this->data, $this->where);
  }

  public function delete()
  {
    return $this->db->delete('admin', $this->where);
  }
}
