<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

helper('mahasiswa');
class Mahasiswa extends BaseController {
    protected $mahasiswaModel;
    
    public function __construct(){
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index() {
        
        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa()
        ];
        
        
        return view('mahasiswa/index', $data);
    }

    public function edit($npm) {
        
        $data = [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($npm),
            'validation' => \Config\Services::validation()
        ];

        if(empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('NPM ' . $npm . ' is not found.');
        }
        
        return view('mahasiswa/edit', $data);
    }

    public function update($npm) {
        // check npm
        $mahasiswaLama = $this->mahasiswaModel->getMahasiswa($this->request->getVar('npm'));
        if($mahasiswaLama['npm'] != $this->request->getVar('npm')) {
            $rule_npm = 'required|is_unique[mahasiswa.npm]';
        } else {
            $rule_npm = 'required';
        }

        // validation
        if (!$this->validate([
            'npm' => [
                'rules' => $rule_npm,
                'errors' => [
                    'required' => 'The NPM field is required.',
                    'numeric' => 'The NPM field must be numeric.',
                    'is_unique' => 'NPM has been taken.'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name field is required.'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Major field is required.'
                ]
            ],
            'fakultas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Faculty field is required.'
                ]
            ],
            'hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'The Phone field is required.',
                    'numeric' => 'The Phone field must be numeric.'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/mahasiswa/edit/' . $this->request->getVar('npm'))->withInput()->with('validation', $validation);
        }

        $this->mahasiswaModel->save([
            'npm' => $npm,
            'nama' => capitalizeFirst($this->request->getVar('nama')),
            'jurusan' => capitalizeFirst($this->request->getVar('jurusan')),
            'fakultas' => capitalizeFirst($this->request->getVar('fakultas')),
            'hp' => $this->request->getVar('hp'),
            'email' => $npm . '@student.upnjatim.ac.id'
        ]);

        session()->setFlashdata('message', 'Data edited successfully.');

        return redirect()->to('/mahasiswa');

    }

    public function insert() {
        $data = [
            'title' => 'Insert Mahasiswa',
            'validation' => \Config\Services::validation()
        ];

        return view('mahasiswa/insert', $data);
    }

    public function save() {
        // validation
        if (!$this->validate([
            'npm' => [
                'rules' => 'required|numeric|is_unique[mahasiswa.npm]',
                'errors' => [
                    'required' => 'The NPM field is required.',
                    'numeric' => 'The NPM field must be numeric.',
                    'is_unique' => 'NPM has been taken.'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name field is required.'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Major field is required.'
                ]
            ],
            'fakultas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Faculty field is required.'
                ]
            ],
            'hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'The Phone field is required.',
                    'numeric' => 'The Phone field must be numeric.'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/mahasiswa/insert')->withInput()->with('validation', $validation);
        }


        $this->mahasiswaModel->save([
            'npm' => $this->request->getVar('npm'),
            'nama' => capitalizeFirst($this->request->getVar('nama')),
            'jurusan' => capitalizeFirst($this->request->getVar('jurusan')),
            'fakultas' => capitalizeFirst($this->request->getVar('fakultas')),
            'hp' => $this->request->getVar('hp'),
            'email' => $this->request->getVar('npm') . '@student.upnjatim.ac.id',
        ]);

        session()->setFlashdata('message', 'Data added successfully.');

        return redirect()->to('/mahasiswa');
    }

    public function delete($npm) {
        $this->mahasiswaModel->delete($npm);
        session()->setFlashdata('message', 'Data deleted successfully.');
        return redirect()->to('/mahasiswa');
    }
}