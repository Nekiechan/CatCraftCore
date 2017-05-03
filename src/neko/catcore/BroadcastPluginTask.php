<?php
namespace ExamplePlugin;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
class BroadcastPluginTask extends PluginTask{
	public function onRun($currentTick){
		if($currentTick<=250){
		Server::getInstance()->broadcastMessage("§0[§9CatCraft§0]§f§l Version: 2.0 Made by CatGirl678!");
	}
	}
}
