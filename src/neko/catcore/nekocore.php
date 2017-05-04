<?php                               
//                                                                                                    
//                              :                                                                     
//                             `#+                                                                    
//                             +.@#                                                                   
//                             @..@;                                                                  
//                            #....@                                                                  
//                            @....:@                                         :                       
//                           +:.....#+                                      '@@                       
//                           @.......@`                                    +@.@'                      
//                          '#.......;@                                   @@...@                      
//                          @.........@:                                `@#....@`                     
//                         '@.........,@                               :@+.....#@                     
//                         @:..........@'                             '@:......,@                     
//                        `@............@                            '@.........@                     
//                        @+............#+                          '@..........@;                    
//                        @,............,@                         '@...........#@                    
//                       +@..............@:                       :@,...........:@                    
//                       @:..............;@    ,;++#++';,        `@:.............@                    
//                      `@................@@@@@@@#####@@@@@@@@;. @+..............@`                   
//                      @+................,':..............,'@@#@@...............@;                   
//                      @......................................,:................#@                   
//                     #@........................................................+@                   
//                     @:........................................................:@                   
//                    ;@..........................................................@.                  
//                    @'..........................................................@'                  
//                    @...........................................................@#                  
//                   @@...........................................................#@                  
//                   @'...........................................................:@                  
//                  ,@.............................................................@:                 
//                  @@.............................................................@#                 
//                  @+.............................................................@@                 
//                  @,.............................................................,@                 
//                 '@...............................................................@#                
//                 @@...............................................................@@                
//                 @@...............................................................,@                
//                 @#................................................................@#               
//                 @#......;#@#;.....................................................#@               
//                 @#........,'@@@:..................................................;@               
//                .@'............'@@:.................................................@;              
//                ,@;..............;@@.............................:#@@@@@@@#.........@@              
//                :@#....`````.......@@;........................,@@@@@+;:::':.........@@              
//                ,@#...``````........#@:......................@@@;...................#@              
//                 @@...``````.........,......................@@,.....................+@              
//                 @@...``````........................................................+@              
//                 #@....````..............................................`````......+@              
//                 '@,....................................................```````.....@@              
//                  @@....................................................```````.....@@              
//                  @@.......................,.;@@@':,,,...................`````......@@              
//                  +@+......................#@@:`+@@@@@....................```.......@@              
//                   @@........................#````@'...............................'@+              
//                   @@#......................,@```;@................................@@               
//                   `@@......................:@```@+................................@@               
//                    +@@.....................:@```@:...............................@@;               
//                     @@@.....................@```@...............................,@@                
//                      @@+....................@'`:@...............................@@;                
//                      ,@@#...................:@,@+..............................#@@                 
//                       '#@@...................'@@..............................@@@                  
//                        ;#@@,................................................,@@@                   
//                          @@@@..............................................+@@@                    
//                           #@@@@,.........................................:@@@@                     
//                            `@@@@@'.....................................:@@@@`                      
//                              ,@@@@@@;................................'@@@@;                        
//                                @@+@@@@@#;........................:+@@@@@@@                         
//                                @#,,,'@@@@@@@',,,.........,,;+@@@@@@@@+:,,#'                        
//                                @#,,,,,,;@@@@@@@@@@@@@@@@@@@@@@@@#':,,,,,,;@                        
//                               .@',,,,,,,,,,,;+@@@@@@@@##+'';,,,,,,,,,,,,;@@@                       
//                               :@@',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,:@@@.@:                      
//                               +@#@@@;,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'@@@;..#@                      
//                               #@..'@@@@@#;,,,,,,,,,,,,,,,,,,,,,,,;@@@@@.....@+                     
//                               @#.....:+@@@@@@@#+;,,,,,,,,,,,,;#@@@@@#.......#@                     
//                               @#..........:#@@@@@@@@@@@@@@@@@@@@#:...........@#                    
//                               @#............@@@;+@@@@@@@@@#+',...............'@                    
//                              `@'...........+@@````+@+.........................@#                   
//                              ,@;...........@@ `````+@.........................'@                   
//                              '#:...........@`  ```` @..........................@#                  
//                              +#,...........@ ```,```@:.........................'@                  
//                              ##,...........@```@@ ` @,..........................@+                 
//                              ##,...........@@``#@``;@...........................+@                 
//                              #+............:@@.+@`'@@............................@'                
//                              #+.............:@@@@@@#.............................#@                
//                              #+...............:'#+,..............................,@,               
//                              #+...................................................@@              
//

namespace neko\catcore;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\TranslationContainer;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerJoinEvent;


class nekocore extends PluginBase implements Listener{

public $config;
public $staff=array("Username");
	
  public function onLoad(){
    $this->getLogger()->info("[CatCore loading]");
  }
  public function onEnable(){
    $this->getLogger()->info("[CatCore enabled]");
	  $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new BroadcastPluginTask($this), 120);
	   		@mkdir($this->getDataFolder());
	  		$this->config =  (new Config($this->getDataFolder()."config.yml", Config::YAML, array(
            "joinmsg" => "'Welcome to §l§9NekoCraft! §r§fHave fun and be sure to read the rules!'",
            "staff" => $staff)))->getAll();
  }
  public function onDisable(){
    $this->getLogger()->info("[CatCore disabled]");
  }
 
public function onSpawn(PlayerRespawnEvent $event){
		Server::getInstance()->broadcastMessage($event->getPlayer()->getDisplayName() .  $this->config["joinmsg"]);
}
 public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        switch($command->getName()) {
		case "setwelcomemessage":
                  $this->config["joinmsg"] = implode(' ', $args);
                  $sender->sendMessage(TextFormat::GREEN . "Set Server's join message to: " . implode('', $args));
                return true;
            case "Meowinfo":
                if (count($args) == 0 ){
                    return false;
                }
            //
            //  Thanks to Sukotto_kun for all your kindness ^0^
            //
            case "Suko":
              $sender->sendMessage("Suko - the best person ive ever met ^~^");
            return true;
            case "score":
		            $sender->sendMessage("§0[§9NekoCraft§0]§f§l Player Score: undefined");
		            return true;
            case "staff":
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
$sender->sendMessage("§f/staff <help|add|remove|list>");
$sender->sendMessage("§f/staff help §o§a- Shows Staff help!");
$sender->sendMessage("§f/staff add <player> §o§a- adds Player to staff!");
$sender->sendMessage("§f/staff remove <player> §o§a- removes a Player from staff!");
$sender->sendMessage("§f/staff list §o§a- Lists all Players on staff!");
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
if(count($args) == null){
						$sender->sendMessage("§9[§cStaffy§9]:§c need help? do §a[/staff help]§c!");
						return true;
					}
if($args[0]=="add"){
$sender->sendMessage("§9[§cStaffy§9]:§7 Added:§l§f " . $args[1] . " §r§7To the Staff list!");
array_push($staff, $args[1]);
$this->config["staff"] = $staff;
return true;
}
if($args[0]=="help"){
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
$sender->sendMessage("§f/staff <help|add|remove|list>");
$sender->sendMessage("§f/staff help §o§a- Shows Staff help!");
$sender->sendMessage("§f/staff add <player> §o§a- adds Player to staff!");
$sender->sendMessage("§f/staff remove <player> §o§a- removes a Player from staff!");
$sender->sendMessage("§f/staff list §o§a- Lists all Players on staff!");
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
return true;
}
if($args[0]=="list"){
$sender->sendMessage("§9[§cStaffy§9]:§7 Staff: " . $this->config["staff"]);
return true;
}
if($args[0]=="remove"){

 return true;
}
return true;
                var_dump($args); // do stuff
                return true;
        }
    }
}
