<?php

namespace XboxCrawler\Commons;

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
    public static $fullUrl;
    public static TypeOfStore $typeStore;
    public static Languages $language;

    public function __construct()
    {
        # Your code here
    }

    /**
     * @method setConfigUrl configuration to initialize URL 
     * @param Languages $language 
     * @param TypeOfStore $typeStore
     */
    public function setConfigUrl(Languages $language, TypeOfStore $typeStore)
    {
        self::$language = $language;
        self::$typeStore = $typeStore;
        self::$fullUrl = $this->urlBase."/".$this->setLanguage($this->language)."/".$this->setTypeOfStore($this->typeStore);
    }

    /**
     * @method setLanguage
     * @return String language url style
     */
    private function setLanguage(): string
    {
        $langUrl = null;

        switch (self::$language) {
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
