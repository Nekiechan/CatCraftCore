<?php
namespace neko\catcore;
use neko\catcore\nekocore;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\TranslationContainer;
use pocketmine\Server;
use pocketmine\event\plugin\PluginEvent;
abstract class ScoreEvent extends PluginEvent {
	private $nekocore;
  private $scoreevent
  private $player;
  private $score;
  private $config;
	public function __construct(NekoCore $nekocore,ScoreEvent $scoreevent, int $score, Player $player) {
		parent::__construct($nekocore);
		$this->Neko = $nekocore;
    $this->ScoreEvent = $scoreevent;
    $this->player = $player;
    $this->score = $score;
	}
	/**
	 * @return Neko
	 */
	public function getNeko(): NekoCore {
		return $this->Neko;
	}
  /**
   * @return Score
   */
  public function getScore(): NekoCore {
    return $this->score;
  }
  public function getPlayer(): NekoCore {
    return $this->player->getName();
  }
}
