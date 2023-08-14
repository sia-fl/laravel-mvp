<?php

namespace App\Http\Controllers;

use App\Models\Computer\Computer;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->input('id');
        $computer = Computer::query()
            ->find($id);

        return response()->json($computer);
    }

    public function qrcode(Request $request)
    {
        $id = $request->input('id');

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data(route('computer.show', ['id' => $id]))
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText("$id 号电脑")
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        return response()->streamDownload(
            function () use ($result) {
                $file = fopen('php://output', 'wb');
                fwrite($file, $result->getString());
                fclose($file);
            },
            "qrcode_$id.png"
        );
    }
}
