<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('visa_requests', function (Blueprint $table) {
            // Ajouter la colonne `status` de type VARCHAR avec une valeur par défaut
            $table->string('status')->default('encours');
        });

        // Ajouter la contrainte manuellement pour restreindre les valeurs possibles
        DB::statement("ALTER TABLE visa_requests ADD CONSTRAINT check_status CHECK (status IN ('encours', 'finalisée'))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visa_requests', function (Blueprint $table) {
            // Supprimer la contrainte avant de supprimer la colonne
            DB::statement("ALTER TABLE visa_requests DROP CONSTRAINT IF EXISTS check_status");
            $table->dropColumn('status');
        });
    }
};
