<?php

class Nilai extends CI_Model
{

  protected $data;
  protected $where;

  protected $show = "id, matematika, indonesia, inggris, ipa, total";
  protected $table = "nilai";

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
      ->select($this->show)
      ->get($this->table);

    return $query->result();
  }

  public function insert()
  {
    $this->db->insert($this->table, $this->data);
    return $this->db->insert_id();
  }

  public function update()
  {
    return $this->db->update($this->table, $this->data);
  }
}
