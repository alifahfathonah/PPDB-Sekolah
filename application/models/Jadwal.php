<?php

class Jadwal extends CI_Model
{

  protected $data;
  protected $where;
  // protected $show = "a.id, a.role, a.nama, a.email, a.username, a.status, a.tanggal_daftar, b.nama AS kelas, c.total AS nilai_total, c.matematika, c.indonesia, c.ipa, c.inggris, d.nama AS grade, e.nama AS jurusan";
  protected $show = "a.id, a.jam_awal, a.jam_akhir, a.hari, b.nama AS pelajaran, b.kode AS kode_pelajaran, c.nama AS guru, d.nama AS kelas, e.nama AS grade, f.nama AS jurusan";

  protected $table = "jadwal AS a";
  protected $pelajaran = ["pelajaran AS b", "b.id = a.id_pelajaran"];
  protected $guru = ["guru AS c", "c.id = a.id_guru"];
  protected $kelas = ["kelas AS d", "d.id = a.id_kelas"];
  protected $grade = ["grade AS e", "e.id = a.id_grade"];
  protected $jurusan = ["jurusan AS f", "f.id = a.id_jurusan"];

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
      ->join($this->pelajaran[0], $this->pelajaran[1], "LEFT")
      ->join($this->guru[0], $this->guru[1], "LEFT")
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
      ->join($this->pelajaran[0], $this->pelajaran[1], "LEFT")
      ->join($this->guru[0], $this->guru[1], "LEFT")
      ->join($this->jurusan[0], $this->jurusan[1], "LEFT")
      ->join($this->grade[0], $this->grade[1], "LEFT")
      ->where($this->where);

    if ($group) $this->db->group_by($group);
    if ($orderby) $this->db->order_by($orderby);
    return $query->get()->result();
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

  public function getOne($select = null, $group = null, $orderby = null)
  {
    $query = $this->db
      ->select($select ? $select : $this->show)
      ->from($this->table)
      ->join($this->kelas[0], $this->kelas[1], "LEFT")
      ->join($this->pelajaran[0], $this->pelajaran[1], "LEFT")
      ->join($this->guru[0], $this->guru[1], "LEFT")
      ->join($this->jurusan[0], $this->jurusan[1], "LEFT")
      ->join($this->grade[0], $this->grade[1], "LEFT")
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
      ->get_where('jadwal', $data);

    return $query->row();
  }

  public function insert()
  {
    $this->db->insert('jadwal', $this->data);
    return $this->db->insert_id();
  }

  public function update()
  {
    return $this->db->update('jadwal', $this->data, $this->where);
  }

  public function delete()
  {
    return $this->db->delete('jadwal', $this->where);
  }
}
