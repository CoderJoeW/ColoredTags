<?php

namespace FlamingGenius\ColorTag;

use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\event\PlayerQuitEvent;
use pocketmine\event\Listener;

class ColorTag extends PluginBase implements Listener{
 $playerConfig = new Config($this->getDataFolder() . $player . ".yml" . Config::YAML);
 public function onEnable(){
  $this->saveDefaultConfig();
  $this->getServer()->getPluginManager()->registerEvents($this, $this);
 }
 
 public function onCommand(CommandSender $sender, Command $command, $label, array $args){
 $player = $this->getServer()->getPlayer();
 $cmd = $this->command->getName();
 $tag = $args;
 $config = $this->getConfig()->get("tags");
 if(strtolower($cmd) == "sr"){
  if($tag == $config){
   $setTag = $this->getConfig()->get($tag);
   $player->setNameTag($setTag);
  }
 }
  else{
   $sender->sendMessage("§bTag not reconized");
  }
 }
 
 public function onJoinGame(PlayerJoinEvent $event){
  $players = $event->getServer()->getOnlinePlayers();
  foreach($players as $player){
   $playerConfig;
   
  }
 }

 public function onQuitGame(PlayerQuitEvent $event){
  $player = $this->getServer()->getPlayer()->getName();
  $playerConfig->set($player , $player->getNameTag());
 }


}


?>
