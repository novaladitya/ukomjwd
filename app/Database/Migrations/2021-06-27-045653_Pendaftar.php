<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendaftar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 100,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'id_pendaftaran' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'asal_sekolah' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'nilai' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'status' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'created_at' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'updated_at' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pendaftar');
	}

	public function down()
	{
		$this->forge->dropTable('pendaftar');
	}
}
