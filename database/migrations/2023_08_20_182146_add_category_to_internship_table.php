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
        Schema::table('internship', function (Blueprint $table) {
            $table->string('category')->after('location'); // Add 'category' column after 'location'
        });
    }

    public function down()
    {
        Schema::table('internship', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
