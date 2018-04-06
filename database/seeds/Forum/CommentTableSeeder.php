<?php

use Carbon\Carbon;
use App\Models\Forum\Comment;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class CommentTableSeeder extends Seeder
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

        Comment::create([
            'id'                => '1',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '2',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '3',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '4',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '5',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '6',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '7',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '8',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '9',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Comment::create([
            'id'                => '10',
            'user_id'           => '1',
            'post_id'           => '1',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        $this->enableForeignKeys();
    }
}
