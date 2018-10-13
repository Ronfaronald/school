<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1537944099SchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            
if (!Schema::hasColumn('schools', 'level')) {
                $table->string('level')->nullable();
                }
if (!Schema::hasColumn('schools', 'district')) {
                $table->string('district')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn('level');
            $table->dropColumn('district');
            
        });

    }
}
