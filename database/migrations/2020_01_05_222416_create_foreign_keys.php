<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('link_tags', function(Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('link_tags', function(Blueprint $table) {
            $table->foreign('video_id')->references('id')->on('videos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('videos', function(Blueprint $table) {
            $table->foreign('cat_id')->references('id')->on('cats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_tag', function(Blueprint $table) {
            $table->dropForeign('link_tag_tag_id_foreign');
        });
        Schema::table('link_tag', function(Blueprint $table) {
            $table->dropForeign('link_tag_video_id_foreign');
        });
        Schema::table('videos', function(Blueprint $table) {
            $table->dropForeign('videos_cat_id_foreign');
        });
    }
}
