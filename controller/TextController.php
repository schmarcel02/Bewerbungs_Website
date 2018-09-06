<?php
ClassLoader::loadByName("TextRepository");
ClassLoader::loadByName("TextUtil");

class TextController
{
    public function index()
    {
        Util::location("text/editor");
    }

    public function editor()
    {
        Util::requirePermission(0, 4);
        $briefs = TextRepository::selectBriefs();
        $view = new View("text_editor");
        $view->briefs = $briefs;
        $view->display();
    }

    public function getText()
    {
        Util::requirePermission(0, 4);
        Util::setErrorLoc("text/emptyText");
        $brief = Util::requireParameter("0");
        $lng = Util::requireParameter("1");
        $text = TextUtil::getTranslation($brief, $lng);
        echo $text;
    }

    public function emptyText()
    {
    }

    public function newText()
    {
        Util::requirePermission(0, 4);
        Util::setErrorLoc("text/editor");
        $brief = Util::requireParameter("0");
        if (!TextRepository::briefExists($brief)) {
            TextRepository::insertBrief($brief);
            Util::location("text/editor");
        } else {
            Util::errorLocation("text/editor", "*brief");
        }
    }

    public function save()
    {
        Util::requirePermission(0, 4);
        Util::setErrorLoc("default/home");
        $brief = Util::requireParameter("0");
        $lng = Util::requireParameter("1");
        $text = $_POST['text'];
        if (TextRepository::briefExists($brief)) {
            TextRepository::updateTranslationByBrief($brief, $lng, $text);
        }
    }

    public function delete()
    {
        Util::requirePermission(0, 4);
        Util::setErrorLoc("text/editor");
        $brief = Util::requireParameter("0");
        if (TextRepository::briefExists($brief)) {
            TextRepository::deleteTranslationsByBrief($brief);
            Util::location("text/editor");
        } else {
            Util::errorLocation("text/editor", "-brief");
        }
    }
}