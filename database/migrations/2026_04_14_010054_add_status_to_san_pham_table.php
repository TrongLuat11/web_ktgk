<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Dùng raw SQL để tránh lỗi strict mode với dữ liệu datetime cũ
        DB::statement("SET SESSION sql_mode=''");
        DB::statement("ALTER TABLE `san_pham` ADD COLUMN `status` TINYINT NOT NULL DEFAULT 1 COMMENT '1=active, 0=deleted'");
        // Cập nhật tất cả sản phẩm hiện có thành status = 1
        DB::statement("UPDATE `san_pham` SET `status` = 1");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_pham', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
