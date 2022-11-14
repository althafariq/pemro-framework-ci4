<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model {
    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm';
    protected $useTimestamps = false;
    protected $useAutoIncrement = false;
    protected $allowedFields = ['npm', 'nama', 'jurusan', 'fakultas', 'hp', 'email'];

    public function getMahasiswa($npm = false) {
        if ($npm == false) {
            // return $this->findAll();
            $sql = "SELECT * FROM mahasiswa ORDER BY npm ASC";
            return $this->db->query($sql)->getResultArray();
        }

        return $this->where(['npm' => $npm])->first();
    }

}