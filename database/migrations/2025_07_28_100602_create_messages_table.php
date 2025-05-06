<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('clients')->onDelete('cascade');
            $table->enum('type', ['text', 'image', 'video', 'file', 'audio', 'sticker'])->default('text');
            $table->text('content');
            $table->string('file_name')->nullable();
            $table->integer('file_size')->nullable();
            $table->foreignId('reply_to')->nullable()->constrained('messages')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
