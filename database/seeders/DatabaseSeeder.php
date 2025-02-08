<?php
namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use App\Models\Grade;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        // Create Departments
        $department1 = Department::create([
            'name' => 'Perkembangan Perangkat Lunak dan Gim',
            'desc' => 'Pengembangan Perangkat Lunak dan Gim, fokus pada pembuatan aplikasi dan permainan digital.'
        ]);

        $department2 = Department::create([
            'name' => 'Animasi 2D',
            'desc' => 'Teknik pembuatan animasi dalam dua dimensi.'
        ]);

        $department3 = Department::create([
            'name' => 'Animasi 3D',
            'desc' => 'Teknik pembuatan animasi dalam tiga dimensi.'
        ]);

        $department4 = Department::create([
            'name' => 'DKV Desain Grafika',
            'desc' => 'Berfokus pada penciptaan elemen-elemen visual yang menarik.'
        ]);

        $department5 = Department::create([
            'name' => 'DKV Teknik Grafika',
            'desc' => 'Lebih fokus pada aspek teknis dalam produksi grafis.'
        ]);

        // Create Grades with connections to Departments
        Grade::create(['name' => '10 PPLG 1', 'department_id' => $department1->id]);
        Grade::create(['name' => '10 PPLG 2', 'department_id' => $department1->id]);
        Grade::create(['name' => '11 PPLG 1', 'department_id' => $department1->id]);
        Grade::create(['name' => '11 PPLG 2', 'department_id' => $department1->id]);
        Grade::create(['name' => '12 PPLG 1', 'department_id' => $department1->id]);
        Grade::create(['name' => '12 PPLG 2', 'department_id' => $department1->id]);

        Grade::create(['name' => '10 ANIMASI 4', 'department_id' => $department2->id]);
        Grade::create(['name' => '10 ANIMASI 5', 'department_id' => $department2->id]);
        Grade::create(['name' => '11 ANIMASI 4', 'department_id' => $department2->id]);
        Grade::create(['name' => '11 ANIMASI 5', 'department_id' => $department2->id]);
        Grade::create(['name' => '12 ANIMASI 4', 'department_id' => $department2->id]);
        Grade::create(['name' => '12 ANIMASI 5', 'department_id' => $department2->id]);

        Grade::create(['name' => '10 ANIMASI 1', 'department_id' => $department3->id]);
        Grade::create(['name' => '10 ANIMASI 2', 'department_id' => $department3->id]);
        Grade::create(['name' => '10 ANIMASI 3', 'department_id' => $department3->id]);
        Grade::create(['name' => '11 ANIMASI 1', 'department_id' => $department3->id]);
        Grade::create(['name' => '11 ANIMASI 2', 'department_id' => $department3->id]);
        Grade::create(['name' => '11 ANIMASI 3', 'department_id' => $department3->id]);
        Grade::create(['name' => '12 ANIMASI 1', 'department_id' => $department3->id]);
        Grade::create(['name' => '12 ANIMASI 2', 'department_id' => $department3->id]);
        Grade::create(['name' => '12 ANIMASI 3', 'department_id' => $department3->id]);

        Grade::create(['name' => '10 DKV 1', 'department_id' => $department4->id]);
        Grade::create(['name' => '10 DKV 2', 'department_id' => $department4->id]);
        Grade::create(['name' => '11 DKV 1', 'department_id' => $department4->id]);
        Grade::create(['name' => '11 DKV 2', 'department_id' => $department4->id]);
        Grade::create(['name' => '11 DKV 3', 'department_id' => $department4->id]);
        Grade::create(['name' => '12 DKV 1', 'department_id' => $department4->id]);
        Grade::create(['name' => '12 DKV 2', 'department_id' => $department4->id]);
        Grade::create(['name' => '12 DKV 3', 'department_id' => $department4->id]);

        Grade::create(['name' => '10 DKV 3', 'department_id' => $department5->id]);
        Grade::create(['name' => '10 DKV 4', 'department_id' => $department5->id]);
        Grade::create(['name' => '11 DKV 3', 'department_id' => $department5->id]);
        Grade::create(['name' => '11 DKV 4', 'department_id' => $department5->id]);
        Grade::create(['name' => '12 DKV 4', 'department_id' => $department5->id]);
        Grade::create(['name' => '12 DKV 5', 'department_id' => $department5->id]);

        // Create Students
        Student::factory(100)->create();
        
        // Create a test user
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(StudentSeeder::class);
    }
}
