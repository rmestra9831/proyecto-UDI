<?php

use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivos')->insert(['name'=>'Prueba de suficiencia de ingles']);                
        DB::table('motivos')->insert(['name'=>'Cancelacion']);                
        DB::table('motivos')->insert(['name'=>'Habilitacion']);                
        DB::table('motivos')->insert(['name'=>'Inclusion']);                
        DB::table('motivos')->insert(['name'=>'Reintegro o readmision']);                
        DB::table('motivos')->insert(['name'=>'Validacion']);                
        DB::table('motivos')->insert(['name'=>'Aplazamiento']);                
        DB::table('motivos')->insert(['name'=>'Supletorio ']);                
        DB::table('motivos')->insert(['name'=>'Cuenta de cobro']);                
        DB::table('motivos')->insert(['name'=>'Hoja de vida']);                
        DB::table('motivos')->insert(['name'=>'Servios publicos']);                
        DB::table('motivos')->insert(['name'=>'Invitaciones']);                
        DB::table('motivos')->insert(['name'=>'Derecho de peticion']);                
        DB::table('motivos')->insert(['name'=>'Permiso laboral']);                
        DB::table('motivos')->insert(['name'=>'Certificado laboral']);                
        DB::table('motivos')->insert(['name'=>'Traslado de sede']);                
        DB::table('motivos')->insert(['name'=>'Homologacion']);                
        DB::table('motivos')->insert(['name'=>'Curso vacacional']);                
        DB::table('motivos')->insert(['name'=>'Cambio de programa']);                
        DB::table('motivos')->insert(['name'=>'Dev de documentos']);                
        DB::table('motivos')->insert(['name'=>'Excusa de inasistencia']);                
        DB::table('motivos')->insert(['name'=>'Cambio de horario']);                
    }
}
