<?php
namespace neko\catcore\event;

use neko\catcore\nekocore;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\plugin\PluginEvent;
use pocketmine\utils\Config;


class ScoreEvent{
    public $PlayerConfig;
    public $score;
    public function __construct(Player $player,$score){
        $this->player = $player;
        $this->score = $score;
        $this->PlayerConfig = $PlayerConfig;
    }
    public function PlayerDataBase(Player $player, $score){
        if(isset($PlayerData)){
    
        }else{
            define("PlayerData", array(
            "Name" => $player->getName(),
            "Score" => $score
            ));
        }
        @mkdir($this->getDataFolder() . "/Players/" . $player->getName() . "/");
        $ScoreDirectory = "/Players/";
        $PlayerDirectory = $player->getName() . "/";
        $this->PlayerConfig = new Config($this->getDataFolder() . $ScoreDirectory . $PlayerDirector . "Score.yml", Config::YAML, $PlayerData);
        $this->PlayerConfig->save();
        }
        public function getScore(){
        return $this->PlayerConfig["Score"];   
        }
        public function getPlayerDataName(){
        return $this->PlayerConfig["Name"];
        }
}
