<?php

/**
 * Class UsageModel
 *
 * @description Model untuk manajemen data penggunaan listrik
 *
 * @package     Models
 * @subpackage  UsageModel
 * @category    Model
 */
class M_usage extends CI_Model
{
  
  public function get_filtered_usage($where = [], $keyword = null, $daya = null)
  {
    $this->db->select('penggunaan.*, pelanggan.nama_pelanggan, tarif.daya, 
                      (SELECT COUNT(*) FROM tagihan WHERE tagihan.id_penggunaan = penggunaan.id_penggunaan) AS total_tagihan');
    $this->db->from('penggunaan');
    $this->db->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');

    // 🔍 Searching
    if (!empty($keyword)) {
      $this->db->group_start();
      $this->db->like('penggunaan.id_pelanggan', $keyword);
      $this->db->or_like('pelanggan.nama_pelanggan', $keyword);
      $this->db->or_like('penggunaan.id_penggunaan', $keyword);
      $this->db->group_end();
    }

    // 🔽 Filter daya
    if (!empty($daya)) {
      $this->db->where('tarif.daya', $daya);
    }

    $this->db->order_by('penggunaan.tahun', 'DESC');
    $this->db->order_by('penggunaan.bulan', 'DESC');
    return $this->db->get()->result();
  }

  public function get_filtered_penggunaan_admin($search = null, $daya = null)
  {
    $this->db->select('penggunaan.*, pelanggan.nama_pelanggan, tarif.daya, 
                      (SELECT COUNT(*) FROM tagihan WHERE tagihan.id_penggunaan = penggunaan.id_penggunaan) AS total_tagihan');
    $this->db->from('penggunaan');
    $this->db->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');

    // 🔍 Filter pencarian
    if (!empty($search)) {
      $this->db->group_start();
      $this->db->like('penggunaan.id_penggunaan', $search);
      $this->db->or_like('penggunaan.id_pelanggan', $search);
      $this->db->or_like('pelanggan.nama_pelanggan', $search);
      $this->db->group_end();
    }

    // 🔽 Filter daya
    if (!empty($daya)) {
      $this->db->where('tarif.daya', $daya);
    }

    // Urutan data terbaru
    $this->db->order_by('penggunaan.tahun', 'DESC');
    $this->db->order_by('penggunaan.bulan', 'DESC');

    return $this->db->get()->result();
  }

  //Cust
  public function get_filtered_penggunaan_pelanggan($id_cs, $keyword = null, $daya = null)
  {
    $this->db->select('penggunaan.*, pelanggan.nama_pelanggan, tarif.daya');
    $this->db->from('penggunaan'); // HAPUS penggunaan USE INDEX
    $this->db->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
    $this->db->where('penggunaan.id_pelanggan', $id_cs);

    // Ambil filter dari $_GET secara langsung (karena tidak dikirim dari controller)
      $search = $this->input->get('search');
      $bulan  = $this->input->get('bulan');
      $tahun  = $this->input->get('tahun');

      if (!empty($search)) {
        $this->db->group_start();
        $this->db->like('penggunaan.id_penggunaan', $search);
        $this->db->or_like('pelanggan.nama_pelanggan', $search);
        $this->db->group_end();
      }

      if (!empty($bulan)) {
        $this->db->where('penggunaan.bulan', $bulan);
      }

      if (!empty($tahun)) {
        $this->db->where('penggunaan.tahun', $tahun);
      }

    $this->db->order_by('pelanggan.nama_pelanggan', 'ASC');

    return $this->db->get()->result();
  }

  public function get_all_daya()
  {
    $this->db->select('DISTINCT tarif.daya');
    $this->db->from('tarif');
    $this->db->order_by('tarif.daya', 'ASC');
    $query = $this->db->get();
    return array_column($query->result_array(), 'daya');
  }


  public function get_penggunaan_by_id($id)
  {
    $this->db->select('*');
    $this->db->from('penggunaan');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = penggunaan.id_pelanggan');
    $this->db->where('id_penggunaan', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_penggunaan_pelanggan($id_cs)
  {
    $this->db->select('penggunaan.*, pelanggan.nama_pelanggan, tarif.daya');
    $this->db->from('penggunaan'); // HAPUS penggunaan USE INDEX
    $this->db->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
    $this->db->where('penggunaan.id_pelanggan', $id_cs);
    $this->db->order_by("id_penggunaan", "ASC");
  return $this->db->get()->result();
}

  // public function get_filtered_penggunaan_pelanggan($filter)
  // {
  //   $this->db->select('penggunaan.*, pelanggan.nama_pelanggan, tarif.daya');
  //   $this->db->from('penggunaan');
  //   $this->db->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan');
  //   $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
  //   $this->db->where('penggunaan.id_pelanggan', $filter['id_pelanggan']);

  //   if (!empty($filter['search'])) {
  //     $this->db->group_start();
  //     $this->db->like('penggunaan.id_penggunaan', $filter['search']);
  //     $this->db->or_like('penggunaan.bulan', $filter['search']);
  //     $this->db->or_like('penggunaan.tahun', $filter['search']);
  //     $this->db->group_end();
  //   }

  //   if (!empty($filter['daya'])) {
  //     $this->db->where('tarif.daya', $filter['daya']);
  //   }

  //   $this->db->order_by('penggunaan.tahun', 'DESC');
  //   $this->db->order_by('penggunaan.bulan', 'DESC');

  //   return $this->db->get()->result();
  // }

  // public function get_available_daya_by_customer($id_pelanggan)
  // {
  //   $this->db->select('tarif.daya');
  //   $this->db->from('pelanggan');
  //   $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
  //   $this->db->where('pelanggan.id_pelanggan', $id_pelanggan);
  //   $query = $this->db->get();

  //   if ($query->num_rows() > 0) {
  //     return [$query->row()->daya]; // asumsinya pelanggan hanya memiliki 1 daya
  //   }

  //   return [];
  // }

  public function get_penggunaan_by_period($id_cus, $m, $yr)
  {
    $this->db->where('id_pelanggan', $id_cus);
    $this->db->where('bulan', $m);
    $this->db->where('tahun', $yr);
    $query = $this->db->get('penggunaan');

    return $query->row();
  }

  public function check_period_penggunaan($id_cus, $m, $yr)
  {
    $this->db->where('id_pelanggan', $id_cus);
    $this->db->where('bulan', $m);
    $this->db->where('tahun', $yr);
    $query = $this->db->get('penggunaan');
    return $query->num_rows();
  }


  function get_pelanggan_meter_akhir($id_cs)
  {
    $this->db->select('meter_akhir');
    $this->db->from('penggunaan');
    $this->db->where('id_pelanggan', $id_cs);
    $this->db->order_by('id_penggunaan', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row()->meter_akhir;
    }
    return 0;
  }



  public function update_penggunaan($id, $data)
  {
    $this->db->where('id_penggunaan', $id);
    $this->db->update('penggunaan', $data);
  }


  public function delete_penggunaan($id_penggunaan)
  {
    $this->db->where('id_penggunaan', $id_penggunaan);
    $this->db->delete('penggunaan');
  }

  public function insert_penggunaan($data)
  {
    $this->db->insert('penggunaan', $data);
    // $this-db->insert

    // // cek apakah data penggunaan sudah ada untuk pelanggan tertentu pada bulan dan tahun yang sama
    // $query = $this->db->get_where('penggunaan', array('id_pelanggan' => $id_cus, 'bulan' => $m, 'tahun' => $yr));
    // if ($query->num_rows() > 0) {
    //   $is_new = FALSE;
    //   // update data penggunaan yang sudah ada
    //   $this->db->update('penggunaan', $data, array('id_pelanggan' => $id_cus, 'bulan' => $m, 'tahun' => $yr));
    // } else {
    //   $is_new = TRUE;
    //   // tambahkan data penggunaan baru ke database
    //   $this->db->insert('penggunaan', $data);
    // }
    // return ["affected_rows" => $this->db->affected_rows(), "is_new" => $is_new];
  }
}
