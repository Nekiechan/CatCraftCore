<?php
namespace neko\catcore\CatCoreEvent;
use pocketmine\Player;
use pocketmine\Server
use pocketmine\event\plugin\PluginEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\TranslationContainer;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerJoinEvent;
class ConfigEvent extends PluginEvent {
    public static $handlerList = null;
    private $name;
    public function __construct($plugin, $name){
        parent::__construct($plugin);
        $this->player = $name;
    }
    /**@return Player*/
    public function getPlayer(){
        return $this->player;
    }
    public function makeDir(){
        @mkdir($this->dataPath());
        @mkdir($this->dataPath()."players/");
        @mkdir($this->dataPath()."scoring/");
}
}

