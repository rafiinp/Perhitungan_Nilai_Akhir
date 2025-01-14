<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NilaiModel;

class NilaiController extends Controller
{
    protected $nilaiModel;

    public function __construct()
    {
        $this->nilaiModel = new NilaiModel();
    }

    public function index()
    {
        $data['nilai'] = $this->nilaiModel->findAll();
        return view('nilai/index', $data);
    }

    public function hitung()
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'nama' => 'required',
            'tugas' => 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[0]',
            'uts' => 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[0]',
            'uas' => 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[0]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $nama = $this->request->getPost('nama');
        $tugas = $this->request->getPost('tugas');
        $uts = $this->request->getPost('uts');
        $uas = $this->request->getPost('uas');

        // Hitung nilai akhir (30% tugas, 30% UTS, 40% UAS)
        $nilai_akhir = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
        
        // Tentukan grade
        $grade = $this->hitungGrade($nilai_akhir);

        $data = [
            'nama' => $nama,
            'nilai_tugas' => $tugas,
            'nilai_uts' => $uts,
            'nilai_uas' => $uas,
            'nilai_akhir' => $nilai_akhir,
            'grade' => $grade
        ];

        $this->nilaiModel->insert($data);
        return redirect()->to('/nilai')->with('message', 'Nilai berhasil dihitung dan disimpan');
    }

    public function edit($id)
    {
        $data['nilai'] = $this->nilaiModel->find($id);
        
        if (empty($data['nilai'])) {
            return redirect()->to('/nilai')->with('error', 'Data nilai tidak ditemukan');
        }
        
        return view('nilai/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        
        $rules = [
            'nama' => 'required',
            'tugas' => 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[0]',
            'uts' => 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[0]',
            'uas' => 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[0]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $nama = $this->request->getPost('nama');
        $tugas = $this->request->getPost('tugas');
        $uts = $this->request->getPost('uts');
        $uas = $this->request->getPost('uas');

        // Hitung nilai akhir (30% tugas, 30% UTS, 40% UAS)
        $nilai_akhir = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
        
        // Tentukan grade
        $grade = $this->hitungGrade($nilai_akhir);

        $data = [
            'nama' => $nama,
            'nilai_tugas' => $tugas,
            'nilai_uts' => $uts,
            'nilai_uas' => $uas,
            'nilai_akhir' => $nilai_akhir,
            'grade' => $grade
        ];

        $this->nilaiModel->update($id, $data);
        return redirect()->to('/nilai')->with('message', 'Nilai berhasil diperbarui');
    }

    public function delete($id)
    {
        $nilai = $this->nilaiModel->find($id);
        
        if (empty($nilai)) {
            return redirect()->to('/nilai')->with('error', 'Data nilai tidak ditemukan');
        }

        $this->nilaiModel->delete($id);
        return redirect()->to('/nilai')->with('message', 'Data nilai berhasil dihapus');
    }

    private function hitungGrade($nilai)
    {
        if ($nilai >= 85) return 'A';
        if ($nilai >= 75) return 'B';
        if ($nilai >= 60) return 'C';
        if ($nilai >= 45) return 'D';
        return 'E';
    }
}