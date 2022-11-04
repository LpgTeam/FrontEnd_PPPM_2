<?php
namespace App\Models;
use CodeIgniter\Model;
class AnggaranTotalModel extends Model
{
 protected $table = 'anggaran_total';
 protected $primaryKey = 'id_total';
 protected $allowedFields = ['tahun', 'dana_keluar', 'sisa_anggaran'];
}