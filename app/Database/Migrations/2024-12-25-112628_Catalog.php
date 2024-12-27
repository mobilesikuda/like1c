<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Catalog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'title' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('catalogs');
    }

    public function down()
    {
        $this->forge->dropTable('catalogs');
    }
}
