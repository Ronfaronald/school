<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1537825141SchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            
if (!Schema::hasColumn('schools', 'city')) {
                $table->string('city')->nullable();
                }
if (!Schema::hasColumn('schools', 'religion')) {
                $table->string('religion')->nullable();
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
            $table->dropColumn('city');
            $table->dropColumn('religion');
            
        });

    }
}
