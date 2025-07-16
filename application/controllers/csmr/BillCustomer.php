<?php

/**
 * Class BillCustomer
 *
 * @description Controller untuk halaman dan mengatur fitur tagihan pelanggan
 *
 * @package     Customer Controller
 * @subpackage  BillCustomer
 * @category    Controller
 */
class BillCustomer extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_customer_login();
  }


public function index()
{
  $user_auth = get_logged_in_customer();
  $data["title"] = "Data Tagihan";
  $data['user_auth'] = $user_auth;

  // Ambil parameter dari input GET
  $search = $this->input->get('search');
  $status = $this->input->get('status');

  // Kirim parameter ke model
  $data['bills'] = $this->M_bill->get_filtered_tagihan_adm([
    'id_pelanggan' => $user_auth->id_pelanggan,
    'search' => $search,
    'status' => $status
  ]);

  // Kirim kembali filter ke view agar tetap tampil
  $data['search'] = $search;
  $data['status'] = $status;

    $this->load->view('layouts/head', $data);
    $this->load->view('layouts/sidebar', $data);
    $this->load->view('layouts/header', $data);
    $this->load->view('v_cs_bill', $data);
    $this->load->view('layouts/footer', $data);
    $this->load->view('layouts/end', $data);
  }

  public function detail($id)
  {
    $user_auth = get_logged_in_customer();
    $data["req_id"] = $id;
    $bill = $this->M_bill->get_tagihan_by_id($id);


    $error_notfound = TRUE;

    if ($bill) {
      $error_notfound = FALSE;
      $data["title"] = "Detail Tagihan : " . $bill->id_tagihan;
      $admin_fee = AdminFee();
      $total_bill = $bill->tarif_perkwh * $bill->jumlah_meter;
      $total_pay = $total_bill + $admin_fee;
      $data["total_bill"] = Rupiah($total_bill);
      $data["admin_fee"] = Rupiah($admin_fee);
      $data["total_pay"] = Rupiah($total_pay);
      if ($bill->status === 'UNPAID') {
        $data['payment_notice'] = "Tagihan ini belum dibayar. Silakan lakukan pembayaran melalui agen resmi atau kantor PLN terdekat.";
      } else {
        $data['payment_notice'] = "Tagihan ini sudah lunas. Terima kasih telah melakukan pembayaran.";
      }
    }

    $data["error"] = $error_notfound;
    $data["bill"] = $bill;
    $data['user_auth'] = $user_auth;

    $this->load->view('layouts/head', $data);
    $this->load->view('layouts/sidebar', $data);
    $this->load->view('layouts/header', $data);
    $this->load->view('v_cs_bill_info', $data);
    $this->load->view('layouts/footer', $data);
    $this->load->view('layouts/end', $data);
  }
}
