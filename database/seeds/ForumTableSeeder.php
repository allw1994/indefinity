<?php

use Illuminate\Database\Seeder;

/**
 * Class ForumTableSeeder.
 */
class ForumTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(ResponseTableSeeder::class);

        $this->enableForeignKeys();
    }
}
