<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{

    public function showQR()
    {

    $data = Stock::pluck('stocks')->first();

    if (!empty($data)) {
        return QrCode::size(200)
            ->style('dot')
            ->eye('circle')
            ->margin(1)
            ->generate($data);
    } else {
        return "No data available for QR code generation.";
    }
    }

}
