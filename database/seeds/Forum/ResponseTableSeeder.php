<?php

use Carbon\Carbon;
use App\Models\Forum\Response;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class ResponseTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        Response::create([
            'id'                => '1',
            'user_id'           => '1',
            'comment_id'        => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '2',
            'user_id'           => '1',
            'comment_id'        => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '3',
            'user_id'           => '1',
            'comment_id'        => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '4',
            'user_id'           => '1',
            'comment_id'        => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '5',
            'user_id'           => '1',
            'comment_id'        => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '6',
            'user_id'           => '1',
            'comment_id'        => '2',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '7',
            'user_id'           => '1',
            'comment_id'        => '2',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '8',
            'user_id'           => '1',
            'comment_id'        => '3',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '9',
            'user_id'           => '1',
            'comment_id'        => '3',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Response::create([
            'id'                => '10',
            'user_id'           => '1',
            'comment_id'        => '4',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        $this->enableForeignKeys();
    }
}
