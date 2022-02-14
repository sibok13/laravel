<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\OrderParse;

class JobsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function __invoke()
    {
        $parseList = OrderParse::All('link', 'category')->toArray();
        foreach ($parseList as $url)
        {
            
            NewsParsingJob::dispatch($url['link'], $url['category']);
        }

        return redirect()->route('admin.resurce.index')
        ->with('success', 'Задачи успешно добавлены');
    }
}
