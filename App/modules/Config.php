<?php

namespace XboxCrawler;

enum Languages
{
    case Portugues;
    case English;
}

enum TypeOfStore
{
    case Xbox;
    case GamePass;
}

class Config
{
    private $urlBase = "https://www.xbox.com";
    public static $urlCatalogy;

    public function __construct(public Languages $lang, public TypeOfStore $typeStore)
    {
        $this->urlCatalogy = "https://www.xbox.com/pt-BR/games/all-games";
    }

    public function setUrlCategory(Languages $lang, TypeOfStore $typeStore)
    {
        self::$urlCatalogy = $this->urlBase."/".$this->setLanguage($lang)."/".$this->setTypeOfStore($typeStore);
    }

    private function setLanguage(Languages $lang): string
    {
        $langUrl = null;

        switch ($lang) {
            case Languages::Portugues:
                $langUrl = "pt-br";
                break;
            case Languages::English:
                $langUrl = "en-us";
                break;
        }

        return $langUrl;
    }

    private function setTypeOfStore(TypeOfStore $typeStore): string
    {
        $store = null;

        switch ($typeStore) {
            case TypeOfStore::GamePass:
                $store = "xbox-game-pass/games";
                break;
            case TypeOfStore::Xbox:
                $store = "games/all-games";
                break;
        }

        return $store;
    }
}
