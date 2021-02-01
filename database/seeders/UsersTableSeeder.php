<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gerardo Belot',
                'email' => 'gbelot2003@example.com',
                'email_verified_at' => '2021-01-30 17:16:44',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '1HbasJuNHk',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'state' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-01-30 17:16:44',
                'updated_at' => '2021-01-30 17:16:44',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Prof. Grayson Bins',
                'email' => 'domenica45@example.net',
                'email_verified_at' => '2021-01-30 17:16:44',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'GNnb9qZFNH',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'state' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-01-30 17:16:44',
                'updated_at' => '2021-01-30 17:16:44',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Ethan Feil Jr.',
                'email' => 'wintheiser.jake@example.com',
                'email_verified_at' => '2021-01-30 17:16:44',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'SCzrSQH2Yy',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'state' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-01-30 17:16:44',
                'updated_at' => '2021-01-30 17:16:44',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Taryn Schaden I',
                'email' => 'river.medhurst@example.org',
                'email_verified_at' => '2021-01-30 17:16:44',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '5ZGM9YsXcA',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'state' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-01-30 17:16:44',
                'updated_at' => '2021-01-30 17:16:44',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Ila Windler',
                'email' => 'schmidt.jon@example.net',
                'email_verified_at' => '2021-01-30 17:16:44',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'ZT2ZuCuoS8',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'state' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-01-30 17:16:44',
                'updated_at' => '2021-01-30 17:16:44',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Lilian Walter',
                'email' => 'casper30@example.net',
                'email_verified_at' => '2021-01-30 17:16:44',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'rPtvcfH5pj',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'state' => 1,
                'deleted_at' => NULL,
                'created_at' => '2021-01-30 17:16:45',
                'updated_at' => '2021-01-30 17:16:45',
            ),
        ));

        $user = User::find(1);
        $user->assignRole('administrator');

        $user = User::find(2);
        $user->assignRole('moderator');

        $user = User::find(3);
        $user->assignRole('costumer');

        $user = User::find(4);
        $user->assignRole('user');

        $user = User::find(4);
        $user->assignRole('user');

        $user = User::find(5);
        $user->assignRole('user');

        $user = User::find(6);
        $user->assignRole('user');


    }
}