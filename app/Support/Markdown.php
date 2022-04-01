<?php
namespace App\Support;

use Illuminate\Support\HtmlString;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;

class Markdown
{
    public static function parse($text)
    {
        $environment = Environment::createCommonMarkEnvironment();

        $environment->addExtension(new TableExtension());
        $environment->addExtension(new AutolinkExtension());

        $converter = new CommonMarkConverter([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ], $environment);

        return new HtmlString($converter->convertToHtml($text ?? ''));
    }
}