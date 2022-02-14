<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Contracts\Parser;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $link;
    protected string $category;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected function __construct(string $link, string $category)
    {
        $this->link = $link;
        $this->category = $category;
        //dd($this->link, $this->category);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Parser $servise)
    {
        $parceResult = $servise->setLink($this->link)->parse() + ['category'=>$this->category];
        //dd($parceResult);

             foreach ($parceResult['news'] as $news) 
            {
                if(!$item = News::where('title', $news['title'])->first())
                {
                    $data = [
                        'title' => $news['title'],
                        'description' => $news['description'],
                        'author' => $parceResult['title'],
                        'status' => 'PUBLISHED',
                        'slug' => Str::slug($news['title'])
                    ];
                    $model = News::create($data);

                    DB::table('news_in_category')
                    -> insert([
                        'category_id' => $this->category,
                        'news_id' => $model->id
                    ]);
                };
            }
    }
}
