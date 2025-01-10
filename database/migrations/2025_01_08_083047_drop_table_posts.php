<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('table_posts'); // Διαγραφή του πίνακα
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Προαιρετικά: Αν θέλεις να επαναφέρεις τον πίνακα, μπορείς να προσθέσεις τον ορισμό του εδώ.
        Schema::create('table_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }
};
