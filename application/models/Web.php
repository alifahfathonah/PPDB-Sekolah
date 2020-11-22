<?php

class Web extends CI_Model
{

  protected $data;
  protected $where;

  protected $table = "web";

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
      ->get($this->table);

    return $query->row();
  }

  public function update()
  {
    return $this->db->update($this->table, $this->data, $this->where);
  }
}
