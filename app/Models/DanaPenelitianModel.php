<?php
namespace App\Models;
use CodeIgniter\Model;
class DanaPenelitianModel extends Model
{
 protected $table = 'dana_penelitian';
 protected $primaryKey = 'id_dana';
 protected $allowedFields = ['id_penelitian', 'tanggal_pencairan', 'dana_keluar', 'dana_tidak_terserap'];
}
