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
        DB::table('motivos')->insert(['name'=>'prueba de suficiencia de ingles','type_motivo'=>'2']);             
        DB::table('motivos')->insert(['name'=>'cancelacion','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'habilitacion','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'inclusion','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'reintegro o readmision','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'validacion','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'aplazamiento','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'supletorio ','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'cuenta de cobro','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'hoja de vida','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'servios publicos','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'invitaciones','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'derecho de petición','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'permiso laboral','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'certificado laboral','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'traslado de sede','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'homologación','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'curso vacacional','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'cambio de programa','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'devolución de documentos','type_motivo'=>'1']);                
        DB::table('motivos')->insert(['name'=>'excusa de inasistencia','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'cambio de horario','type_motivo'=>'2']);                
        DB::table('motivos')->insert(['name'=>'otro','type_motivo'=>'3']);                
    }
}
