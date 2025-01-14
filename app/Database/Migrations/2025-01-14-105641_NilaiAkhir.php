<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNilaiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nilai_tugas' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'nilai_uts' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'nilai_uas' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'nilai_akhir' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'grade' => [
                'type' => 'CHAR',
                'constraint' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('nilai');
    }

    public function down()
    {
        $this->forge->dropTable('nilai');
    }
}