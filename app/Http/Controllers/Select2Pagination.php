<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Select2Pagination extends Controller
{
    public function nationalities()
    {
        if (\request()->ajax()) {
            $search = trim(\request('search'));
            $nationalities = DB::table('nationalities')
                ->select('id', DB::raw("CONCAT(name_ar, ' | ', name_en) AS text"))
                ->where('name_ar', 'LIKE', '%' . $search . '%')
                ->orWhere('name_en', 'LIKE', '%' . $search . '%')
                ->simplePaginate(10);
            $morePages = true;
            $pagination_obj = json_encode($nationalities);
            if (empty($nationalities->nextPageUrl())) {
                $morePages = false;
            }
            $results = array(
                "results" => $nationalities->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );
            return \Response::json($results);
        }
    }
}
