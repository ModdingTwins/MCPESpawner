<?php

namespace MTwins;

use pocketmine\scheduler\PluginTask;
use pocketmine\tile\MobSpawner;

class PTask extends PluginTask {
 
 /** @var Main */
 public $plugin;
 /** @var Block */
 public $block;
 /** @var string */
 public $type;
 
 public function __construct(Main $plugin, Block $block, string $type){
  parent::__construct($plugin);
  $this->plugin = $plugin;
  $this->block = $block;
  $this->type = $type;
 }
 
 /**
  * @param int $tick
  *
  * @return void
  */
 public function onRun(int $tick): void{
  $tile = $this->block->getLevel()->getTile(new Vector3($this->block->getX(), $this->block->getY(), $this->block->getZ()));
  if($tile instanceof MobSpawner) {
   $plugin->getLogger()->info("Translating to {$this->type}...");
   switch($this->type){
    case "zombie":
     $tile->setEntityId(32);
     break;
    case "pigman":
     $tile->setEntityId(36);
     break;
    case "spider":
     $tile->setEntityId(35);
     break;
    case "iron_golem":
     $tile->setEntityId(20);
     break;
    case "blaze":
     $tile->setEntityId(43);
     break;
    case "pig":
     $tile->setEntityId(12);
     break;
    case "cow":
     $tile->setEntityId(11);
     break;
    case "chicken":
     $tile->setEntityId(10);
     break;
    case "squid":
     $tile->setEntityId(17);
     break;
   }
  }
 }

}
