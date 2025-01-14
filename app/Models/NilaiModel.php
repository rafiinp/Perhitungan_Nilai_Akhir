<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'nilai_akhir', 'grade'];
    protected $useTimestamps = true;
}