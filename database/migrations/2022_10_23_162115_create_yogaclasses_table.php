
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
        Schema::create('yogaclasses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('class_name');
            $table->text('teacher');
            $table->datetime('datetime');
            $table->integer('available');
            $table->integer('reserved')->default(0);
            $table->integer('length');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yogaclasses');
    }
};
