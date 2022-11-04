<?php
namespace App\Models;
use CodeIgniter\Model;
class AnggaranAwalModel extends Model
{
 protected $table = 'anggaran_awal';
 protected $primaryKey = 'id_tahunAnggaran';
 protected $allowedFields = ['tahun_anggaran', 'jumlah'];
}
