<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use Brick\Math\BigInteger;
use IntlChar;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Hash;
use App\Models\Categorias;
use App\Models\Tallas;
use App\Models\User;
use App\Models\Productos;
use App\Models\Colores;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //COLORES
        $arrays = range(0,10);
        foreach ($arrays as $valor) {
            DB::table('colores')->insert([
                'color' => Str::random(10),
            ]);
        }
        //CATEGORIAS
        $arrays = range(0,15);
        foreach ($arrays as $valor) {
            DB::table('categorias')->insert([
                'categoria' => Str::random(10),
                'estado' => 'OK'
            ]);
        }
        //SUBCATEGORIAS
        $arrays = range(0,8);
        foreach ($arrays as $valor) {
            DB::table('categorias')->insert([
                'categoria' => Str::random(10),
                'id_cat_padre' => Categoria::all()->random()->id,
                'estado' => 'OK'
            ]);
        }
        //ADMIN
        DB::table('clientes')->insert([
            'nombre' => 'admin',
            'apellido1' => 'admin',
            'apellido2' => 'admin',
            'email' => 'admin@gmail.com',
            'contacto1' => '666666666',
            'password' => Hash::make('admin'),
            'rol' => 'admin'
        ]);
        //CLIENTES
        $arrays = range(0,10);
        foreach ($arrays as $valor) {
            DB::table('clientes')->insert([
                'nombre' => Str::random(10),
                'apellido1' => Str::random(10),
                'apellido2' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'contacto1' => '666666666',
                'password' => Hash::make('cliente'),
                'rol' => 'cliente'
            ]);
        }
        //TALLAS
        $arrays = range(0,8);
        foreach ($arrays as $valor) {
            DB::table('tallas')->insert([
                'talla' => Str::random(10),
            ]);
        }
        //PRODUCTOS
        $arrays = range(0,300);
        foreach ($arrays as $valor) {
            DB::table('productos')->insert([
                'nombre' => Str::random(10),
                'marca' => Str::random(10),
                'descripcion' => Str::random(50),
                'id_categoria' => Categoria::all()->random()->id,
                'estado' => 'OK'
            ]);
        }
        $precios = array("5.99", "8.99", "12.99", "29.99", "89.50");
        //STOCK
        $arrays = range(0,300);
        foreach ($arrays as $valor) {
            $ind = rand(0,4);
            DB::table('stock')->insert([
                'id_producto' => Productos::all()->random()->id,
                'id_talla' => Tallas::all()->random()->id,
                'id_color' => Colores::all()->random()->id,
                'precio' => $precios[$ind],
                'ventas' => rand(20,250),
                'stock' => rand(20,250),
                'foto1' => 'foto1.jpg',
                'foto2' => 'foto2.jpg',
                'foto3' => 'foto3.jpg',
                'foto4' => 'foto4.jpg',
                'foto5' => 'foto5.jpg',
            ]);
        }
    }
}
