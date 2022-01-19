<?php

namespace App\Http\Controllers\API;

use App\Ban;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanController extends Controller
{

    public function create(Request $request)
    {
        $requestAll = $request->all();

        if (isset($requestAll['ip']) && $requestAll['ip'] != "") {
            $tryFindBan = Ban::where('ip', trim($requestAll['ip']))->first();
            if ($tryFindBan) {
                // $tryFindBan->update($requestAll);    // Обновим updated_at
                $ban = $tryFindBan;
            } else {
                $ban = Ban::create($requestAll);
            }
        } else {
            $ban = null;
        }
        return response()->json($ban, 200);
    }

    public function findByIp(Request $request)
    {
        $requestAll = $request->all();

        if (isset($requestAll['ip']) && $requestAll['ip'] != "") {
            $ban = Ban::where('ip', $requestAll['ip'])->first();
        } else {
            $ban = null;
        }

        return response()->json($ban, 200);
    }

    public function delete($id)
    {
        Ban::findOrFail($id)->delete();

        return response()->json('Успешно удален', 200);
    }

    public function deleteByIp($ip)
    {
        Ban::where('ip', $ip)->delete();

        return response()->json('Успешно удален', 200);
    }

    public function index()
    {

        $banList  = Ban::all();

        return response()->json($banList, 200);
    }
}
