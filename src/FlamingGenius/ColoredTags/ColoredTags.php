<?php

namespace FlamingGenius\ColoredTags;

use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\event\PlayerQuitEvent;
use pocketmine\event\Listener;

class ColoredTags extends PluginBase implements Listener{

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
  $playerConfig = new Config($this->getDataFolder() . $player . ".yml" . Config::YAML);
  $playerConfig->save();
   
  }
 }

 public function onQuitGame(PlayerQuitEvent $event){
  $player = $this->getServer()->getPlayer()->getName();
   $playerConfig = new Config($this->getDataFolder() . $player . ".yml" . Config::YAML);
  $playerConfig->set($player , $player->getNameTag());
  $playerConfig->save();
 }


}


?>