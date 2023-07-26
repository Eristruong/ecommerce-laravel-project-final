<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoldtimeToBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
               // Thêm trường soldtime kiểu datetime với giá trị mặc định là null
               $table->datetime('soldtime')->nullable()->after('codevnpay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            // Xóa trường soldtime nếu muốn rollback migration
            $table->dropColumn('soldtime');
        });
    }
}
