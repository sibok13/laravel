<?php

declare(srtict_types=1);

namespace App\Services;
use App\Contracts\Parser;
use Laravie\parser\Document;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private Document $document;

    public function setLink(string $link): Parser
    {
        $this->document = XmlParser::load($link);
        return $this;
    }

    public function parse(): array
    {
        return $this->document->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }
}