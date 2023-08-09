<?php

use App\Models\Tag\TagStation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tag_station', function (Blueprint $table) {
            $table->id();
            $table->string('image', 200)->comment('图片');
            $table->string('name', 80)->comment('基站名称');
            $table->string('code', 120)->index()->comment('设备编号');
            $table->string('address', 120)->default('')->index()->comment('地址');
            $table->text('memo')->default('')->comment('备注');

            $table->timestamps();
        });

        $debug = config('app.debug');
        if ($debug) {
            $station = new TagStation();
            $station->image = 'tag/test/station/1.png';
            $station->name = '基站1';
            $station->code = 'A60';
            $station->address = '走廊1';
            $station->memo = '<p>基站背面照片<figure data-trix-attachment="{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;基站背面图.png&quot;,&quot;filesize&quot;:385417,&quot;height&quot;:476,&quot;href&quot;:&quot;http://127.0.0.1:11010/storage/tag/test/station/1b.png&quot;,&quot;url&quot;:&quot;http://127.0.0.1:11010/storage/tag/test/station/1b.png&quot;,&quot;width&quot;:498}" data-trix-content-type="image/png" data-trix-attributes="{&quot;presentation&quot;:&quot;gallery&quot;}" class="attachment attachment--preview attachment--png"><a href="http://127.0.0.1:11010/storage/tag/test/station/1b.png"><img src="http://127.0.0.1:11010/storage/tag/test/station/1b.png" width="498" height="476"><figcaption class="attachment__caption"><span class="attachment__name">基站背面照片.png</span> <span class="attachment__size">376.38 KB</span></figcaption></a></figure></p>';
            $station->save();

            $station = new TagStation();
            $station->image = 'tag/test/station/1.png';
            $station->name = '基站2';
            $station->code = 'A61';
            $station->address = '办公室1';
            $station->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_station');
    }
};
