<?php

/**
 * Copyright 2019 myval2
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
 
namespace Myval;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\Server;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener{
	
	
	public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this); 
        $this->getServer()->getPluginManager()->registerEvents(new Items(), $this);        
	     $this->getLogger()->info(C::YELLOW . "Enabled");
    } 
    
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {       
          if($cmd->getName() == "hub") {
            if($sender instanceof Player) {
            $sender->getInventory()->clearAll();
            $sender = $sender->getPlayer();            
        	$sender->sendMessage("§aTeleporting..."); 
            $sender->teleport($this->getServer()->getLevelByName("lobby")->getSafeSpawn());
            $sender->getLevel()->loadChunk($sender->getX() >> 4, $sender->getZ() >> 4, true);
            //$sender->teleport(Server::getInstance()->getDefaultLevel()->getSafeSpawn());             
           $sender->getInventory()->setItem(8, Item::get(351, 1)->setCustomName(C::YELLOW . "Hide ".C::GREEN."Players"));
           $sender->getInventory()->setItem(1, Item::get(340, 0, 1)->setCustomName("§eProfile"));
           $sender->getInventory()->setItem(5, Item::get(378, 0, 1)->setCustomName("§eCosmetics"));                
          } 
        }       
return false; 
   }            	
     }    