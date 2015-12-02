<?php

/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 31.10.2015
 * Time: 0:55
 */
interface HtmlElementInterface
{
    public function getText();

    public function render();
}

class Element implements HtmlElementInterface
{
    protected $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function render()
    {
        return "<span>" . $this->text . "</span>";
    }
}

// 2.
abstract class AbstractHtmlDecorator implements HtmlElementInterface
{
    protected $element;

    public function __construct(HtmlElementInterface $element)
    {
        $this->element = $element;
    }

    public function getText()
    {
        return $this->element->getText();
    }

    public function render()
    {
        return $this->element->render();
    }
}

class DivDecorator extends AbstractHtmlDecorator
{
    public function render()
    {
        return "<div>" . $this->element->render() . "</div>";
    }
}

class ParagraphDecorator extends AbstractHtmlDecorator
{
    public function render()
    {
        return "<p>" . $this->element->render() . "</p>";
    }
}

class SectionDecorator extends AbstractHtmlDecorator
{
    public function render()
    {
        return "<section>" . $this->element->render() . "</section>";
    }
}

// 3.
$div = new DivDecorator(
    new ParagraphDecorator(
        new Element("Welcome to SitePoint!")
    )
);
echo $div->render();

$section = new SectionDecorator(
    new DivDecorator(
        new ParagraphDecorator(
            new Element("Welcome to SitePoint!")
        )
    )
);
echo $section->render();