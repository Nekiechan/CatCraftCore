<?php
namespace neko\catcore\CatCoreEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\plugin\PluginEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\TranslationContainer;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerJoinEvent;

class ScoreEvent extends PluginEvent {
    public static $handlerList = null;
    private $score;
    private $name;
    private $plrscore;
    private $scoreConfig;
    private $scoreConfigdir;
    public function __construct($plugin, $score, $name, $plrscore, $scoreConfig, $scoreConfigdir){
        parent::__construct($plugin);
        $this->player = $name;
        $this->score = $score;
        $this->scoredir = $scoreConfigdir;
        $this->scoreConfig = $scoreConfig;
    }
    /**@return Player*/
    public function getPlayer(){
        return $this->player;
    }
    /**@return int*/
    public function getScore(){
        return $this->score;
    }
    /**@param int $number*/
    public function setScore($number){
        $this->score = $number;
    }
    /**@param int $number*/
    public function addScore($number){
        if($this->score!==null){
          $this->score += $number;
          }else{
          /** If score is undefined */
          
          }
    }
    /**@return int*/
    public function ScoretoPlayer($player, $number){
        
    }
    public function saveScore(){
    
    }
}
