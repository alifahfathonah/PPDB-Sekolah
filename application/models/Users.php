<?php

class Users extends CI_Model
{

  protected $data;
  protected $where;
  protected $show = "a.id, a.role, a.nama, a.email, a.username, a.status, a.tanggal_daftar, b.nama AS kelas, c.total AS nilai_total, c.matematika, c.indonesia, c.ipa, c.inggris, d.nama AS grade, e.nama AS jurusan";

  protected $table = "users AS a";
  protected $kelas = ["kelas AS b", "b.id = a.id_kelas"];
  protected $nilai = ["nilai AS c", "c.id = a.id_nilai"];
  protected $grade = ["grade AS d", "d.id = a.id_grade"];
  protected $jurusan = ["jurusan AS e", "e.id = a.id_jurusan"];

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
      ->from($this->table)
      ->join($this->kelas[0], $this->kelas[1], "LEFT")
      ->join($this->nilai[0], $this->nilai[1], "LEFT")
      ->join($this->jurusan[0], $this->jurusan[1], "LEFT")
      ->join($this->grade[0], $this->grade[1], "LEFT")
      ->get();

    return $query->result();
  }

  public function get($select = null, $group = null, $orderby = null)
  {
    $query = $this->db
      ->select($select ? $select : $this->show)
      ->from($this->table)
      ->join($this->kelas[0], $this->kelas[1], "LEFT")
      ->join($this->nilai[0], $this->nilai[1], "LEFT")
      ->join($this->jurusan[0], $this->jurusan[1], "LEFT")
      ->join($this->grade[0], $this->grade[1], "LEFT")
      ->where($this->where);

    if ($group) $this->db->group_by($group);
    if ($orderby) $this->db->order_by($orderby);
    return $query->get()->result();
  }

  public function getOne($select = null, $group = null, $orderby = null)
  {
    $query = $this->db
      ->select($select ? $select : $this->show)
      ->from($this->table)
      ->join($this->kelas[0], $this->kelas[1], "LEFT")
      ->join($this->nilai[0], $this->nilai[1], "LEFT")
      ->join($this->jurusan[0], $this->jurusan[1], "LEFT")
      ->join($this->grade[0], $this->grade[1], "LEFT")
      ->where($this->where);


    if ($group) $this->db->group_by($group);
    if ($orderby) $this->db->order_by($orderby);
    return $query->get()->row();
  }

  public function check($data)
  {
    $select = 'id, username, password, status, role';
    $query = $this->db
      ->select($select)
      ->get_where('users', $data);

    return $query->row();
  }

  public function insert()
  {
    $this->db->insert('users', $this->data);
    return $this->db->insert_id();
  }

  public function update()
  {
    return $this->db->update('users', $this->data, $this->where);
  }

  public function delete()
  {
    return $this->db->delete('users', $this->where);
  }
}
