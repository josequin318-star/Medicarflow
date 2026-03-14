<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->integer('role_id')->primary();
            $table->string('nombre_rol', 50);
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id_user')->primary();
            $table->string('nombre_completo', 100);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->date('fecha_registro');
            $table->integer('role_id');
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
        });
    
        Schema::create('pacientes', function (Blueprint $table) {
            $table->integer('id_paciente')->primary();
            $table->string('nombre', 100);
            $table->integer('edad');
            $table->enum('genero', ['M', 'F', 'Otro']);
            $table->date('fecha_ingreso',);
        });

        Schema::create('pqr_quejas', function (Blueprint $table) {
            $table->integer('id_pqr')->primary();
            $table->string('tipo', 50);
            $table->string('estado', 50);
            $table->date('fecha');
            $table->integer('id_paciente');
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes')->onDelete('cascade');
        });

        Schema::create('citas_medicas', function (Blueprint $table) {
            $table->integer('id_cita')->primary();
            $table->string('especialidad', 50);
            $table->string('estado_cita', 50);
            $table->date('fecha');
            $table->integer('id_paciente');
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes')->onDelete('cascade');
        });

        Schema::create('medicamentos', function (Blueprint $table) {
            $table->integer('id_med')->primary();
            $table->string('nombre_med', 100);
            $table->integer('strock_actual');
            $table->integer('stock_minimo');
            $table->decimal('precio', 10, 2);
        });

        Schema::create('medicos', function (Blueprint $table) {
            $table->integer('id_medico')->primary();
            $table->string('nombre_medico', 100);
            $table->string('especialidad', 50);
            $table->string('turno', 20);
        });

        Schema::create('facturacion', function (Blueprint $table) {
            $table->integer('id_factura')->primary();
            $table->string('metodo_pago');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_pago');
        });

        Schema::create('laboratorio', function (Blueprint $table) {
            $table->integer('id_lab')->primary();
            $table->string('tipo_examen', 50);
            $table->string('resultado', 20);
            $table->date('fecha');
        });

        Schema::create('camas_hosp', function (Blueprint $table) {
            $table->integer('id_cama')->primary();
            $table->integer('piso');
            $table->string('estado_cama', 20);
        });

        Schema::create('proveedores', function (Blueprint $table) {
            $table->integer('id_proveedor')->primary();
            $table->string('nombre_empresa', 100);
            $table->decimal('monto_deuda', 10, 2);
            $table->integer('calificacion');
        });

        Schema::create('ambulancias', function (Blueprint $table) {
            $table->integer('id_ambulancia')->primary();
            $table->string('placa', 10);
            $table->integer('km_recorrido');
            $table->string('estado_mecanico', 20);
        });

        Schema::create('insumos_aseo', function (Blueprint $table) {
            $table->integer('id_insumo')->primary();
            $table->string('articulo', 50);
            $table->integer('cantidad');
            $table->string('area_uso', 50);
        });

        Schema::create('historias_clin', function (Blueprint $table) {
            $table->integer('id_hist')->primary();
            $table->string('enfermedad', 100);
            $table->string('alergias', 100);
            $table->integer('id_paciente');
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes')->onDelete('cascade');
        });

        Schema::create('recetas_med', function (Blueprint $table) {
            $table->integer('id_receta')->primary();
            $table->integer('cantidad_med');
            $table->date('fecha_receta');
            $table->integer('id_medico');
            $table->foreign('id_medico')->references('id_medico')->on('medicos')->onDelete('cascade');
        });

        Schema::create('nomina_pers', function (Blueprint $table) {
            $table->integer('id_nom')->primary();
            $table->string('cargo', 50);
            $table->decimal('sueldo', 10, 2);
            $table->integer('faltas');
        });

        Schema::create('emergencias', function (Blueprint $table) {
            $table->integer('id_em')->primary();
            $table->integer('triaje');
            $table->integer('tiempo_espera_min');
            $table->date('fecha');
        });

        Schema::create('equipos_med', function (Blueprint $table) {
            $table->integer('id_equipo')->primary();
            $table->string('nombre_equipo', 100);
            $table->string('estado_uso', 20);
            $table->integer('dias_para_mantenimiento');
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('pqr_quejas');
        Schema::dropIfExists('citas_medicas');
        Schema::dropIfExists('medicamentos');
        Schema::dropIfExists('medicos');
        Schema::dropIfExists('facturacion');
        Schema::dropIfExists('laboratorio');
        Schema::dropIfExists('camas_hosp');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('ambulancias');
        Schema::dropIfExists('insumos_aseo');
        Schema::dropIfExists('historias_clin');
        Schema::dropIfExists('recetas_med');
        Schema::dropIfExists('nomina_pers');
        Schema::dropIfExists('emergencias');
        Schema::dropIfExists('equipos_med');
    }
};
