<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        $data = [
            'name' => 'dipika',
            'email'    => 'dipika@test.com',
            'password' => 'test',
        ];

        // Simple Queries
        $this->db->query('INSERT INTO users (name, email,password) VALUES(:name:, :email:, :password:)', $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
