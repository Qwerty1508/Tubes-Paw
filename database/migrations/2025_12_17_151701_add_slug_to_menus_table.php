<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
        });

        // Isi slug berdasarkan nama menu yang sudah ada
        $menus = DB::table('menus')->get();
        foreach ($menus as $menu) {
            $slug = Str::slug($menu->name);
            DB::table('menus')->where('id', $menu->id)->update(['slug' => $slug]);
        }

        // Jadikan slug required dan unik
        Schema::table('menus', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};