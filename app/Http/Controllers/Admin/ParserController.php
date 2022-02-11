<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderParse;
use Illuminate\Support\Str;
use App\Models\News;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $servise)
    {
        $parseList = OrderParse::get('link')->toArray();
        $parceResult = [];

        foreach ($parseList as $url)
        {
            $parceResult[] = $servise->setLink($url['link'])->parse();
        }

        foreach ($parceResult as $item) 
        {
            foreach ($item['news'] as $news) 
            {
                $data = [
                    'title' => $news['title'],
                    'description' => $news['description'],
                    'author' => $item['title'],
                    'status' => 'PUBLISHED',
                    'slug' => Str::slug($news['title'])
                ];
                News::create($data);
            }
        }
        return redirect()->route('admin.resurce.index')
            ->with('success', 'Новости спарсены успешно');
    }
}
