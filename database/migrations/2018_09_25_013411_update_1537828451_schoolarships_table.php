<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1537828451SchoolarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schoolarships', function (Blueprint $table) {
            if(Schema::hasColumn('schoolarships', 'description')) {
                $table->dropColumn('description');
            }
            
        });
Schema::table('schoolarships', function (Blueprint $table) {
            
if (!Schema::hasColumn('schoolarships', 'description')) {
                $table->text('description')->nullable();
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
        Schema::table('schoolarships', function (Blueprint $table) {
            $table->dropColumn('description');
            
        });
Schema::table('schoolarships', function (Blueprint $table) {
                        $table->string('description')->nullable();
                
        });

    }
}
