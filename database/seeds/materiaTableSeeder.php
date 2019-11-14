<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class materiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    	DB::table('materias')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('materias')->insert([
		    "nombre" => "Formación Humana y Social",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "DHPC",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "DHTIC",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Matemáticas Elementales",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Algebra Superior",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Cálculo Diferencial",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Matemáticas Discretas",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Geometría Análitica con Algebra Lineal",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Cálculo Integral",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Probabilidad y Estadística",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Ecuaciones Diferenciales",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "HAA",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Redacción",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Metodología de la Programación",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Ensamblador",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Programación I",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Sistemas Operativos I",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Programación II",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Estructuras de Datos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Graficación",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Innovación y Talento Emprendedor",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Métodos Numéricos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Programación Concurrente y Paralela",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Circuitos Eléctricos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Diseño Digital",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Sistemas Operativos II",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Circuitos Electrónicos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Programación Distribuida",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Sistemas Digitales",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Microprocesadores e Interfaces",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Transmisión y Comunicación de Datos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Base de Datos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Modelo de Redes",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Administración de Redes",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Redes Inalámbricas",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Análisis y Diseño de Algoritmos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Arquitectura de Computadoras",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Sistemas Empotrados",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Ingeniería de Software",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Desarrollo de Aplicaciones Móviles",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Administración de Proyectos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Proyectos I+D I",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Proyectos I+D II",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Tópicos en Ingeniería",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Arquitectura Avanzada de Computadoras",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Control Digital",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Diseño de Sistemas de Tiempo Real",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Sistemas de Tiempo Real",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Ingeniería Web",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Minería de Datos",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Tratamiento de la Información",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Ingeniería de Software Avanzada",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Introducción a la Robótica",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Aplicaciones Multimedia",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Técnicas de Inteligencia Artificial",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Interacción Humano Computadora",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Procesamiento Digital de Imágenes",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Animación por Computadora",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Simulación",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Investigación de Operaciones",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Aplicaciones Web",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Intercomunicación y Seguridad en Redes",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Cómputo Obicuo",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('materias')->insert([
		    "nombre" => "Introducción a los Compiladores",
		    "descripcion" => "none",
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
    }
}
