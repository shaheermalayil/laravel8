<?php

namespace App\Console\Commands;
use Illuminate\Database\Console\Migrations\BaseCommand;
use Illuminate\Console\Command;
use Config;
use DB;
use Log;
use Illuminate\Database\Migrations\Migrator;
class DatabaseMigrate extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:migrate {--database= : The database connection to use}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate all the client databases';

    /**
     * The migrator instance.
     *
     * @var \Illuminate\Database\Migrations\Migrator
     */
    protected $migrator;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->migrator = app('migrator');
        parent::__construct();
        // $this->migrator = $migrator;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $db = DB::table('papers')->get();
        DB::disconnect('mysql');
        foreach ($db as  $client) {
        //     $this->info('Migrating '.$client->name);
            // $this->migrator->usingConnection($this->option('database'), function () {
                Config::set('database.connections.mysql.database', $client->name); //new database name, you want to connect to.
                // $this->prepareDatabase();
            // });
            Config::set('database.connections.mysql.username', $newUN); //new database name, you want to connect to.
            // Config::set('database.connections.mysql.password', $newPSWD); //new database name, you want to connect to.
            DB::reconnect('mysql');
            DB::setDefaultConnection('mysql');
            // $this->prepareDatabase();
            // if (! $this->migrator->repositoryExists()) {
            // $this->call('migrate:install');
            // }   
            $this->call('migrate');

        }
        // $this->info('Completed migration');

        
    }
  
}
