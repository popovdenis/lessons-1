<?php
function createRss()
{
    $rss_name = 'rss2.xml';
    $rss_title = "News feed";
    $rss_link = "http://lessons/xml/news.php";

    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->formatOutput = true; // с отступами
//    $dom->preserveWhiteSpace = false;
    $rss = $dom->createElement('rss');
    $rss->setAttribute('version', '2.0');

    $dom->appendChild($rss);

    $channel = $dom->createElement('channel');
    $rss->appendChild($channel);

    $title = $dom->createElement('title', $rss_title);
    $link = $dom->createElement('link', $rss_link);

    $channel->appendChild($title);
    $channel->appendChild($link);

    $item = $dom->createElement('item');

    $iIitle = $dom->createElement('title', 'Item title');
    $iLink = $dom->createElement('link', 'Link to item');
    $iDescription = $dom->createElement('descriptiion', 'Description of item');
    $iPubDate = $dom->createElement('pubDate', 'Publication date');
    $iCategory = $dom->createElement('category', 'News category');

    $item->appendChild($iIitle);
    $item->appendChild($iLink);
    $item->appendChild($iDescription);
    $item->appendChild($iPubDate);
    $item->appendChild($iCategory);

    $channel->appendChild($item);

    // --------------------------
    $item = $dom->createElement('item');

    $iIitle = $dom->createElement('title', 'Item title');
    $iLink = $dom->createElement('link', 'Link to item');
    $iDescription = $dom->createElement('descriptiion', 'Description of item');
    $iPubDate = $dom->createElement('pubDate', 'Publication date');
    $iCategory = $dom->createElement('category', 'News category');

    $item->appendChild($iIitle);
    $item->appendChild($iLink);
    $item->appendChild($iDescription);
    $item->appendChild($iPubDate);
    $item->appendChild($iCategory);

    $channel->appendChild($item);

    // -----------------------------
    $item = $dom->createElement('item');

    $iIitle = $dom->createElement('title', 'Item title');
    $iLink = $dom->createElement('link', 'Link to item');
    $iDescription = $dom->createElement('descriptiion', 'Description of item');
    $iPubDate = $dom->createElement('pubDate', 'Publication date');
    $iCategory = $dom->createElement('category', 'News category');

    $item->appendChild($iIitle);
    $item->appendChild($iLink);
    $item->appendChild($iDescription);
    $item->appendChild($iPubDate);
    $item->appendChild($iCategory);

    $channel->appendChild($item);

    $dom->save($rss_name);

}
createRss();