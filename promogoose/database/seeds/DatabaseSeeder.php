<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//put sql in database with laravel
		// php artisan db:seed
        // Eloquent::unguard();
        $path = 'ScriptOnlyVilles.sql';
        DB::unprepared(file_get_contents($path));

        $this->call(UserTableSeeder::class);
        $this->call(AvisSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(CategorieSeeder::class);
        $this->call(ShopsSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(AdhesionSeeder::class);
        
        $this->command->info('Database seed Success!!!! OwO');
    }
}
