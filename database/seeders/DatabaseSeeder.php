<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryDetail;
use App\Models\Survey;
use App\Models\SurveyDetail;
use App\Models\SurveyDetailUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $users = [
            [
                'id' => 1,
                'name' => 'User test 1',
                'email' => Str::random(5).'@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 2,
                'name' => 'User test 2',
                'email' => Str::random(5).'@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 3,
                'name' => 'User test 3',
                'email' => Str::random(5).'@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }

        $categories = [
            [
                'id' => 1,
                'code' => 'IT-1.01',
                'description' => 'Persentase lulusan S1 dan D4/D3/D2',
            ],
            [
                'id' => 2,
                'code' => 'IT-2.01',
                'description' => 'Persentase lulusan S1 dan D4/D3/D2',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $categoryDetails = [
            [
                'id' => 1,
                'category_id' => 1,
                'code' => 'IK-1.01.01',
                'description' => 'Survei Kepuasan Mahasiswa (%)',
                'satuan' => '%',
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'code' => 'IK-1.01.02',
                'description' => 'Survei Kepuasan Masyarakat dan Industri (%)',
                'satuan' => '%',
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'code' => 'IK-1.01.03',
                'description' => 'Mahasiswa yang memperoleh beasiswa',
                'satuan' => 'Org',
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'code' => 'IK-1.01.04',
                'description' => 'Mahasiswa yang diluluskan',
                'satuan' => 'Org',
            ],
            [
                'id' => 5,
                'category_id' => 1,
                'code' => 'IK-1.02.01',
                'description' => 'Mahasiswa yang dimagangkan ke Perusahaan Luar Negeri',
                'satuan' => 'Org',
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'code' => 'IK-1.02.02',
                'description' => 'Mahasiswa yang dimagangkan ke perusahaan dalam negeri',
                'satuan' => 'Org',
            ],
            [
                'id' => 7,
                'category_id' => 1,
                'code' => 'IK-1.02.03',
                'description' => 'Mahasiswa yang Magang bersertifikat kampus merdeka (microced)',
                'satuan' => 'Org',
            ],
            [
                'id' => 8,
                'category_id' => 1,
                'code' => 'IK-1.02.03',
                'description' => 'Mahasiswa mengikuti Studi Independent bersertifikat kampus',
                'satuan' => 'Org',
            ],
            [
                'id' => 9,
                'category_id' => 2,
                'code' => 'IK-2.01.01',
                'description' => 'Survei Kepuasan Mahasiswa (%)',
                'satuan' => '%',
            ],
            [
                'id' => 10,
                'category_id' => 2,
                'code' => 'IK-2.01.02',
                'description' => 'Survei Kepuasan Masyarakat dan Industri (%)',
                'satuan' => '%',
            ],
            [
                'id' => 11,
                'category_id' => 2,
                'code' => 'IK-2.01.03',
                'description' => 'Mahasiswa yang memperoleh beasiswa',
                'satuan' => 'Org',
            ],
            [
                'id' => 12,
                'category_id' => 2,
                'code' => 'IK-2.01.04',
                'description' => 'Mahasiswa yang diluluskan',
                'satuan' => 'Org',
            ],
        ];

        foreach ($categoryDetails as $categoryDetail) {
            CategoryDetail::create($categoryDetail);
        }

        $surveys = [
            [
                'id' => 1,
                'year' => 2021,
                'description' => Str::random(25)
            ],
        ];

        foreach ($surveys as $survey) {
            Survey::create($survey);
        }

        $surveyDetails = [
            [
                'id' => 1,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 1,
            ],
            [
                'id' => 2,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 2,
            ],
            [
                'id' => 3,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 3,
            ],
            [
                'id' => 4,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 4,
            ],
            [
                'id' => 5,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 5,
            ],
            [
                'id' => 6,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 6,
            ],
            [
                'id' => 7,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 7,
            ],
            [
                'id' => 8,
                'survey_id' => 1,
                'category_id' => 1,
                'category_detail_id' => 8,
            ],
            [
                'id' => 9,
                'survey_id' => 1,
                'category_id' => 2,
                'category_detail_id' => 1,
            ],
            [
                'id' => 10,
                'survey_id' => 1,
                'category_id' => 2,
                'category_detail_id' => 2,
            ],
            [
                'id' => 11,
                'survey_id' => 1,
                'category_id' => 2,
                'category_detail_id' => 3,
            ],
            [
                'id' => 12,
                'survey_id' => 1,
                'category_id' => 2,
                'category_detail_id' => 4,
            ],
        ];

        foreach ($surveyDetails as $surveyDetail) {
            SurveyDetail::create($surveyDetail);
        }

        $surveyDetailUsers = [
            [
                'survey_detail_id' => 1,
                'user_id' => 1,
            ],
            [
                'survey_detail_id' => 1,
                'user_id' => 2,
            ],
            [
                'survey_detail_id' => 1,
                'user_id' => 3,
            ],
            [
                'survey_detail_id' => 2,
                'user_id' => 2,
            ],
            [
                'survey_detail_id' => 4,
                'user_id' => 1,
            ],
        ];

        foreach ($surveyDetailUsers as $surveyDetailUser) {
            SurveyDetailUser::create($surveyDetailUser);
        }
    }
}
