<?php

use Illuminate\Database\Seeder;

class TipoTramitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => "autorizacion-centralizada",
            'archivo' => "autorizacion-centralizada.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "diabetes",
            'archivo' => "diabetes.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "epilepsia",
            'archivo' => "epilepsia.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "hemofilia",
            'archivo' => "hemofilia.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "medicamentos-destinados-a-esclerosis-multiple",
            'archivo' => "medicamentos-destinados-a-esclerosis-multiple.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "medicamentos-ins-renal-cronica",
            'archivo' => "medicamentos-ins-renal-cronica.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "patologias-cronicas",
            'archivo' => "patologias-cronicas.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "patologias-inflamtorias-cronicas-y-enf-reumaticos",
            'archivo' => "patologias-inflamtorias-cronicas-y-enf-reumaticos.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "radioterapia",
            'archivo' => "radioterapia.pdf"
        ]);
        DB::table('users')->insert([
            'nombre' => "solicitud-de-medicamentos-y-materias-descartables-en-diabetes",
            'archivo' => "solicitud-de-medicamentos-y-materias-descartables-en-diabetes.pdf"
        ]);
    }
}
