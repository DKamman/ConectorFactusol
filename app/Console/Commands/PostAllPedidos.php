<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\FactusolPedidoController;
use App\Models\ClienteCredential;

class PostAllPedidos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:pedidos {cliente? : name of the distributor company}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Posts all distributor orders to Factusol Database';

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
            FactusolPedidoController::post($credential);
        } else {
            $credentials = ClienteCredential::all();
            foreach ($credentials as $credential) {
                FactusolPedidoController::post($credential);
            }
        }
    }
}
