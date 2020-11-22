<?php

class Guru extends CI_Model
{

  protected $data;
  protected $where;

  protected $show = "id, nama, email, status, tanggal_daftar";
  protected $table = "guru";
  protected $pelajaran = ["pelajaran AS b", "b.id = a.id_pelajaran"];

  // Setters
  public function setData($data)
  {
    $this->data = $data;
    return $this;
  }

  public function setWhere($data)
  {
    $this->where = $data;
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

  public function getCustom($select = null, $group = null, $orderby = null)
  {
    $query = $this->db
      ->select($select ? $select : $this->show)
      ->from($this->table);

    if ($group) $this->db->group_by($group);
    if ($orderby) $this->db->order_by($orderby);
    return $query->get()->row();
  }

  public function get($select = null, $group = null, $orderby = null)
  {
    $query = $this->db
      ->select($select ? $select : $this->show)
      ->from($this->table)
      ->where($this->where);

    if ($group) $this->db->group_by($group);
    if ($orderby) $this->db->order_by($orderby);
    return $query->get()->row();
  }

  public function insert()
  {
    $query = $this->db->insert($this->table, $this->data);

    return $this->db->insert_id();
  }

  public function update()
  {
    return $this->db->update($this->table, $this->data, $this->where);
  }

  public function delete()
  {
    return $this->db->delete($this->table, $this->where);
  }
}
