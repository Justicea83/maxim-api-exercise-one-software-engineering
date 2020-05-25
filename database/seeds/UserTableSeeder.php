<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users() as $user){
            if(strtolower($user['email']) == 'justicea83@gmail.com'){
                $user['has_fiancee'] = false;
            }else{
                $user['has_fiancee'] = true;
            }
            $user['password'] = bcrypt('lolly');
            User::query()->create($user);
        }
    }

    public function users(): array {
        return [
          [
              'name' => 'Chima',
              'nickname' => 'Unknown',
              'age' => 'hello',
              'email' => 'chima@gmail.com'
          ],
            [
                'name' => 'Stephens',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Stephens@gmail.com'
            ],
            [
                'name' => 'Abdul Malik',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Abdul.Malik@gmail.com'
            ],
            [
                'name' => 'Addae',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Addae@gmail.com'
            ],
            [
                'name' => 'Lolly',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Lolly@gmail.com'
            ],
            [
                'name' => 'Glover',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Glover@gmail.com'
            ],
            [
                'name' => 'Justice',
                'nickname' => 'Unknown',
                'age' => '24',
                'email' => 'justicea83@gmail.com'
            ],
            [
                'name' => 'Jobie',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Jobie@gmail.com'
            ],
            [
                'name' => 'Mabel',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Mabel@gmail.com'
            ],
            [
                'name' => 'Jude',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Jude@gmail.com'
            ],
            [
                'name' => 'Isaac',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Isaac@gmail.com'
            ],
            [
                'name' => 'Sakyi',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Sakyi@gmail.com'
            ],
            [
                'name' => 'Regine',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Regine@gmail.com'
            ],
            [
                'name' => 'Abubakari',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Abubakari@gmail.com'
            ],
            [
                'name' => 'Tom',
                'nickname' => 'Unknown',
                'age' => 'hello',
                'email' => 'Tom@gmail.com'
            ],

        ];
    }
}
