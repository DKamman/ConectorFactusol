<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ClienteController;
use App\Models\ClienteCredential;

class PostAllClientes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:clientes {cliente? : name of the distributor company}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Posting all distributor clients to 20 Bananas Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cliente = $this->argument('cliente');
        if ($cliente != null) {
            $credential = ClienteCredential::where('name', $cliente)->first();
            ClienteController::post($credential);
        } else {
            $credentials = ClienteCredential::all();
            foreach ($credentials as $credential) {
                ClienteController::post($credential);
            }
        }
    }
}
