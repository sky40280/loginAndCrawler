<?php

namespace App\Console\Commands;

use App\Fortune;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class WebCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = date('Y-m-d');
        for ($i = 0; $i <= 11; $i++) {
            $url = "http://astro.click108.com.tw/daily_{$i}.php?iAstro={$i}";
            $html = file_get_contents($url);
            $crawler = new Crawler($html);
            $name = str_after(str_before($crawler->filter('.TODAY_CONTENT')->first()->text(), '解析'), '今日');
            $content = $crawler->filter('.TODAY_CONTENT > p')->each(function (Crawler $node, $i) {
                return $node->text();
            });
            $all = $content[0]. $content[1];
            $love = $content[2]. $content[3];
            $job = $content[4]. $content[5];
            $money = $content[6]. $content[7];
            Fortune::create([
                'date' => $date,
                'name' => $name,
                'all' => $all,
                'love' => $love,
                'job' => $job,
                'money' => $money,
            ]);
        }
    }
}
