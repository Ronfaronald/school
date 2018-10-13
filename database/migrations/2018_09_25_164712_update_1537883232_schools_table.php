<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1537883232SchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            if(Schema::hasColumn('schools', 'perfomance')) {
                $table->dropColumn('perfomance');
            }
            
        });
Schema::table('schools', function (Blueprint $table) {
            
if (!Schema::hasColumn('schools', 'academic')) {
                $table->integer('academic')->nullable();
                }
if (!Schema::hasColumn('schools', 'sports')) {
                $table->integer('sports')->nullable();
                }
if (!Schema::hasColumn('schools', 'culture')) {
                $table->integer('culture')->nullable();
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
            $table->dropColumn('academic');
            $table->dropColumn('sports');
            $table->dropColumn('culture');
            
        });
Schema::table('schools', function (Blueprint $table) {
                        $table->string('perfomance')->nullable();
                
        });

    }
}
