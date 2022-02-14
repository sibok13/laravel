<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderParse;
use Illuminate\Support\Str;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Parser $servise)
    {
        $parseList = OrderParse::All('link', 'category')->toArray();
        $parceResult = [];
        foreach ($parseList as $url)
        {
            $parceResult[] = $servise->setLink($url['link'])->parse() + ['category'=>$url['category']];
        }
        foreach ($parceResult as $item) 
        {
            foreach ($item['news'] as $news) 
            {
                if(!$item = News::where('title', $news['title'])->first()){
                    $data = [
                        'title' => $news['title'],
                        'description' => $news['description'],
                        'author' => $item['title'],
                        'status' => 'PUBLISHED',
                        'slug' => Str::slug($news['title'])
                    ];
                    $model = News::create($data);
    
                    DB::table('news_in_category')
                    -> insert([
                        'category_id' => $item['category'],
                        'news_id' => $model->id
                    ]);
                };
            }
        }
        return redirect()->route('admin.resurce.index')
            ->with('success', 'Новости спарсены успешно');
    }
}
