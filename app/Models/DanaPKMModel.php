<?php
namespace App\Models;
use CodeIgniter\Model;
class DanaPKMModel extends Model
{
 protected $table = 'dana_pkm';
 protected $primaryKey = 'id_dana';
 protected $allowedFields = ['id_pkm', 'tanggal_pencairan', 'dana_keluar', 'dana_tidak_terserap'];
}
