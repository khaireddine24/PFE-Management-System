<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Enseignant;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        Enseignant::create([
            'name' => 'teacher',
            'email' => 'teacher@teacher.com',
            'password' => Hash::make('teacher123'),
        ]);
    }
}