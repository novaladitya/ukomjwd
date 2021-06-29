<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use DateTime;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'email'      => 'admin@psb.com',
				'password'   => 'admin',
				'level'	     => '1',
				'created_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
			],
			[
				'email'      => 'admin2@psb.com',
				'password'   => 'admin2',
				'level'	     => '1',
				'created_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
			],
		];

		$this->db->table('user')->insertBatch($data);
	}
}
