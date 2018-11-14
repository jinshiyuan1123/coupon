<?php

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

        \DB::table('users')->insert([
            0 =>
                [
                    'id'             => 3,
                    'name'           => 'Admin',
                    'email'          => 'admin@qq.com',
                    'password'       => '$2y$10$THzCWaxn/DPlwFGNX6o8/uEy5kK/0AFBa8z5GBG6ApyOgEvBwxwUG',
                    'is_super_admin' => 1,
                    'remember_token' => 'vnjLoBsi4zCqywOa0PBtWXz9ulfBTUHbjoACRXHe3HthmA8wDQO4bPBpOQs8',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            1 =>
                [
                    'id'             => 4,
                    'name'           => 'test',
                    'email'          => 'test@qq.com',
                    'password'       => '$2y$10$THzCWaxn/DPlwFGNX6o8/uEy5kK/0AFBa8z5GBG6ApyOgEvBwxwUG',
                    'is_super_admin' => 1,
                    'remember_token' => '',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 =>
                [
                    'id'             => 1,
                    'name'          => '普通管理员',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        \DB::table('system_config')->delete();

        \DB::table('system_config')->insert([
            0 =>
                [
                    'id'             => 1,
                    'site_name'      => '网站名称',
                    'site_title'     => '网站标题',
                    'keyword'       => '关键词1,关键词2,关键词3,关键词4,关键词5',
                    'phone1'        => '027-87411245',
                    'phone2'        => '027-63524125',
                    'site_domain'   => 'www.motoogame.com',
                    'active_member_money' => 200,
                    'third_version' => '1.0',
                    'third_pay_url' => 'http://pay.1977.cm/apisubmit',
                    'created_at'     => '2017-02-03 09:52:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        \DB::table('api')->delete();

        \DB::table('api')->insert([
            0 =>
                [
                    'id'             => 3,
                    'api_name'      => 'AG',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:00:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            1 =>
                [
                    'id'             => 4,
                    'api_name'      => 'BBIN',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:01:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            2 =>
                [
                    'id'             => 5,
                    'api_name'      => 'AB',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:02:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            3 =>
                [
                    'id'             => 6,
                    'api_name'      => 'PT',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:03:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            4 =>
                [
                    'id'             => 7,
                    'api_name'      => 'MG',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:04:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            5 =>
                [
                    'id'             => 8,
                    'api_name'      => 'TTG',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:05:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            6 =>
                [
                    'id'             => 9,
                    'api_name'      => 'IBC',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:06:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            7 =>
                [
                    'id'             => 10,
                    'api_name'      => 'YC',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:07:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            8 =>
                [
                    'id'             => 11,
                    'api_name'      => 'CG',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:08:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            9 =>
                [
                    'id'             => 12,
                    'api_name'      => 'SA',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:09:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            10 =>
                [
                    'id'             => 13,
                    'api_name'      => 'BG',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:10:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
            11 =>
                [
                    'id'             => 14,
                    'api_name'      => 'DT',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:11:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
//            12 =>
//                [
//                    'id'             => 15,
//                    'api_name'      => 'HJ',
//                    'on_line'       => 0,
//                    'created_at'     => '2017-02-03 09:12:51',
//                    'updated_at'     => '2017-02-03 09:52:51',
//                ],
//            13 =>
//                [
//                    'id'             => 16,
//                    'api_name'      => 'WJS',
//                    'on_line'       => 0,
//                    'created_at'     => '2017-02-03 09:13:51',
//                    'updated_at'     => '2017-02-03 09:52:51',
//                ],
            14 =>
                [
                    'id'             => 2,
                    'api_name'      => 'BI',
                    'on_line'       => 1,
                    'created_at'     => '2017-02-03 09:14:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
//            16 =>
//                [
//                    'id'             => 18,
//                    'api_name'      => 'EBET',
//                    'on_line'       => 0,
//                    'created_at'     => '2017-02-03 09:16:51',
//                    'updated_at'     => '2017-02-03 09:52:51',
//                ],
//            17 =>
//                [
//                    'id'             => 19,
//                    'api_name'      => 'OG',
//                    'on_line'       => 1,
//                    'created_at'     => '2017-02-03 09:17:51',
//                    'updated_at'     => '2017-02-03 09:52:51',
//                ],
//            18 =>
//                [
//                    'id'             => 20,
//                    'api_name'      => 'PNG',
//                    'on_line'       => 0,
//                    'created_at'     => '2017-02-03 09:17:51',
//                    'updated_at'     => '2017-02-03 09:52:51',
//                ],
            19 =>
                [
                    'id'             => 21,
                    'api_name'      => 'EG',
                    'on_line'       => 0,
                    'created_at'     => '2017-02-03 09:17:51',
                    'updated_at'     => '2017-02-03 09:52:51',
                ],
        ]);

        //插入游戏
        $game_list_data = config('game_list');
        $api_list = \App\Models\Api::orderBy('created_at', 'desc')->pluck('id', 'api_name')->toArray();
        foreach ($game_list_data as $api_name => $item)
        {
            if (count(array_filter($item)) > 0)
            {
                $api_id = $api_list[strtoupper($api_name)];
                foreach ($item as $k => $v)
                {
                    if (count(array_filter($v)) > 0)
                    {
                        $client_type = $k == 'web'?1:2;
                        foreach ($v as $value)
                        {
                            \App\Models\GameList::create([
                                'api_id' => $api_id,
                                'name' => $value['name'],
                                'client_type' => $client_type,
                                'game_type' => 3,//默认电子
                                'game_id' => $value['id'],
                                'img_path' => $value['img'],
                                'on_line' => 0,
                                'game_name' => isset($value['game_name'])?$value['game_name']:''
                            ]);
                        }
                    }

                }
            }


        }


    }
}
