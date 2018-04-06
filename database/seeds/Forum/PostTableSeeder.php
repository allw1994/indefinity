<?php

use Carbon\Carbon;
use App\Models\Forum\Post;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class PostTableSeeder extends Seeder
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

        Post::create([
            'id'                => '1',
            'user_id'           => '1',
            'title'             => 'A Spiffing title that is hopefully not sure to break everything and his mother',
            'body'              => 'A novella of a body that is brilliant in every way',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '2',
            'user_id'           => '2',
            'title'             => 'Never Gonna Give You Up',
            'body'              => 'Never gonna put you down',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '3',
            'user_id'           => '3',
            'title'             => 'So come up to the lab and see whats on the slab. I see you shiver with antici...',
            'body'              => 'pation',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '4',
            'user_id'           => '1',
            'title'             => 'Instructions on how to build a solar system',
            'body'              => 'A poor mans bible',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '5',
            'user_id'           => '2',
            'title'             => 'Food Glorious Food',
            'body'              => 'Not That Oliver Ever got any',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '6',
            'user_id'           => '3',
            'title'             => 'Mischief Managed',
            'body'              => 'The Mauraderers Map',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '7',
            'user_id'           => '1',
            'title'             => 'Honestly, Kids these days',
            'body'              => '...Have no money!',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '8',
            'user_id'           => '2',
            'title'             => 'Halo by MC',
            'body'              => 'cheers said the great big tall drunk mongoose',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '9',
            'user_id'           => '3',
            'title'             => 'A Congratulations because why not',
            'body'              => '5/5 stars by the daily mail',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        Post::create([
            'id'                => '10',
            'user_id'           => '1',
            'title'             => 'A delightful title that is hopefully not sure to break everything and her mother',
            'body'              => 'A Book',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        $this->enableForeignKeys();
    }
}
