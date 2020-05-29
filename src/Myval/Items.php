<?php

namespace Myval;

use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\utils\TextFormat as C;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\inventory\Inventory;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\item\Item;
use pocketmine\event\entity\EntityEffectAddEvent;
use pocketmine\event\entity\EntityEvent;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\entity\PrimedTNT;
use pocketmine\event\entity\ExplosionPrimeEvent;
use pocketmine\nbt\tag\Compound;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\Enum;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\scheduler\Task as PluginTask;

class Items implements Listener{
	
	public function onJoin(PlayerJoinEvent $e): void{        
        $player = $e->getPlayer();
        if($e->getPlayer()->getLevel()->getFolderName() == "lobby"){    	
        //$player->addEffect(new EffectInstance(Effect::getEffect(Effect::SPEED), 2147483647, 3, false, true)); 
        $player->getArmorInventory()->clearAll();
       $player->getInventory()->clearAll();
       $player->teleport(Server::getInstance()->getDefaultLevel()->getSafeSpawn()); 

   $pl = $e->getPlayer();
   $pl->getInventory()->setItem(8, Item::get(351, 1)->setCustomName(C::YELLOW . "Hide ".C::GREEN."Players"));
   $pl->getInventory()->setItem(1, Item::get(340, 0, 1)->setCustomName("§eProfile"));
   $pl->getInventory()->setItem(5, Item::get(378, 0, 1)->setCustomName("§eCosmetics"));       
      }
      }
       public function onPlayerDeathEvent(PlayerDeathEvent $e) {
       	$player = $e->getPlayer();
        $player->getArmorInventory()->clearAll();
        $player->getInventory()->clearAll();                     
     }
     
     public function onDrop(PlayerDropItemEvent $e){
     	$player = $e->getPlayer();
         $item = $e->getItem();
         if($e->getPlayer()->getLevel()->getFolderName() == "lobby"){    	
			$e->setCancelled();
			}
			}
			    public function onRespawn(PlayerRespawnEvent $e){
				$player = $e->getPlayer();
	 $player->teleport($this->plugin->getServer()->getLevelByName("lobby")->getSafeSpawn());
      $player->getLevel()->loadChunk($player->getX() >> 4, $player->getZ() >> 4, true);
				
   $player->getInventory()->setItem(8, Item::get(351, 1)->setCustomName(C::YELLOW . "Hide ".C::GREEN."Players"));
   $player->getInventory()->setItem(1, Item::get(340, 0, 1)->setCustomName("§eProfile"));
   $player->getInventory()->setItem(5, Item::get(378, 0, 1)->setCustomName("§eCosmetics"));       
   
           }
		
	
	public function cosmetics(Player $player) {
		$form = new SimpleForm(function(Player $player, $result) {
			if($result === null){
				return;
			}
			switch($result){
				   case 0:
				$this->particles($player);  
					break;
					
					case 1:
					$this->gadgets($player);
					break;
					
					case 2:
					$command = "cape"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
							}
			});
			$form->setTitle("§eCosmetics Menu");
			$form->addButton("§eParticles");
			$form->addButton("§eGadgets");
			$form->addButton("§eCape");
			$form->addButton("§cEXIT");
			$player->sendForm($form);
			return $form;
			}
			
			public function particles(Player $player)
			{ 
		$form = new SimpleForm(function (Player $player, $data){
            $result = $data;           
            if($result === null){
                return true;
            }
            switch ($result){            
					case 0:
					$name = $player->getName();
					$command = "pc set $name VILLAGER_ANGRY"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 1:
					$name = $player->getName();
					$command = "pc set $name VILLAGER_HAPPY"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 2:
					$name = $player->getName();
					$command = "pc set $name FLAME"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 3:
					$name = $player->getName();
					$command = "pc set $name HEART"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 4:
					$name = $player->getName();
					$command = "pc set $name MOB_SPELL_INSTANTANEOUS"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 5:
					$name = $player->getName();
					$command = "pc set $name ITEM_BREAK"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 6:
					$name = $player->getName();
					$command = "pc set $name DRIP_LAVA"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 7:
					$name = $player->getName();
					$command = "pc set $name DRIP_WATER"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 8:
					$name = $player->getName();
					$command = "pc set $name RAIN_SPLASH"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 9:
					$name = $player->getName();
					$command = "pc set $name SMOKE"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 10:
					$name = $player->getName();
					$command = "pc set $name TERRAIN"; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					
					case 11:
					$name = $player->getName();
					$command = "pc remove $name "; 
				    $player->getServer()->dispatchCommand($player, $command);                
					break;
					}
			});
			$form->setTitle("§eParticles Menu!!");
			$form->addButton("§eAngry Villager\n§rClick"); //1
			$form->addButton("§eHappy Villager\n§rClick");//2
			$form->addButton("§eFlame\n§rClick");//3
			$form->addButton("§eHeart\n§rClick");//4
			$form->addButton("§eMob Spell\n§rClick");//5
			$form->addButton("§eItem Break\n§rClick");//6
			$form->addButton("§eDrip Lava\n§rClick");//7
			$form->addButton("§eDrip Water\n§rClick");//8
			$form->addButton("§eRain Splash\n§rClick");//9
			$form->addButton("§eSmoke\n§rClick");//10
			$form->addButton("§eTerrain\n§rClick"); //11
			$form->addButton("§c•Remove Particles•");
			$form->addButton("§cExit");
			$player->sendForm($form);
			return $form;
			}
 
           public function gadgets(Player $player) {
		$form = new SimpleForm(function(Player $player, $result) {
			if($result === null){
				return;
			}
			switch($result){
				case 0:
				$player->getInventory()->setItem(3, Item::get(46, 0, 1)->setCustomName("§cT§rN§cT"));
				break;
				
				case 1:
				$player->getInventory()->setItem(3, Item::get(280, 0, 1)->setCustomName("§6Egg"));           
				break;
				
				case 2:
				$player->getInventory()->remove(Item::get(46, 0, 1)->setCustomName("§cT§rN§cT"));
				$player->getInventory()->remove(Item::get(280, 0, 1)->setCustomName("§6Egg")); 
				break;
			}
			});
	    $form->setTitle("§eGadgets");
		$form->addButton("§cTNT");
		$form->addButton("§6Egg");
		$form->addButton("§9-Remove-");
		$form->addButton("§cExit");
	    $player->sendForm($form);
			return $form;
			}
			
	public function onExplode(ExplosionPrimeEvent $event) {
			$event->setBlockBreaking(false);
			$event->setForce(8);
		}
		public function onDamage(EntityDamageEvent $event){
  if($event->getCause() === EntityDamageEvent::CAUSE_FALL){	
    $event->setCancelled();
    }
    
    
     if($event->getCause() === EntityDamageEvent::CAUSE_ENTITY_EXPLOSION){	    	
    $event->setCancelled();
  }
}  
		
   
    public function onInteract(PlayerInteractEvent $event)
    {              
        $player = $event->getPlayer();
        $item = $event->getItem();
       $level = $player->getLevel();
        $item = $player->getInventory()->getItemInHand();
        if ($item->getName() === C::YELLOW . "Hide ".C::GREEN."Players") {
            $player->getInventory()->remove(Item::get(351, 1)->setCustomName(C::YELLOW . "Hide ".C::GREEN."Players"));
            $player->getInventory()->setItem(8, Item::get(351, 10)->setCustomName(C::YELLOW . "Show ".C::GREEN."Players"));
            $player->sendMessage(C::RED . "Disabled Player Visibility!");           
            foreach($player->getServer()->getOnlinePlayers() as $p) $player->hidePlayer($p);
            
        }elseif($item->getName() === C::YELLOW . "Show ".C::GREEN."Players"){
            $player->getInventory()->remove(Item::get(351, 10)->setCustomName(C::YELLOW . "Show ".C::GREEN."Players"));
            $player->getInventory()->setItem(8, Item::get(351, 1)->setCustomName(C::YELLOW . "Hide ".C::GREEN."Players"));
            $player->sendMessage(C::GREEN . "Enabled Player Visibility!");           
             foreach($player->getServer()->getOnlinePlayers() as $p) $player->showPlayer($p);
            }
               
            if($item->getCustomName() == "§eCosmetics"){
        $this->cosmetics($player);        
            }
            
      if($item->getCustomName() == "§eProfile"){
                    $name = $player->getName();
					$command = "profile $name "; 
				    $player->getServer()->dispatchCommand($player, $command);                
            } 
      if ($item->getCustomName() == "§cT§rN§cT") {
           	$nbt = new CompoundTag("", ["Pos" => new ListTag("Pos", [new DoubleTag("", $player->x), new DoubleTag("", $player->y + $player->getEyeHeight()), new DoubleTag("", $player->z) ]), "Motion" => new ListTag("Motion", [new DoubleTag("", -\sin($player->yaw / 180 * M_PI) * \cos($player->pitch / 180 * M_PI)), new DoubleTag("", -\sin($player->pitch / 180 * M_PI)), new DoubleTag("", \cos($player->yaw / 180 * M_PI) * \cos($player->pitch / 180 * M_PI)) ]), "Rotation" => new ListTag("Rotation", [new FloatTag("", $player->yaw), new FloatTag("", $player->pitch) ]) ]);
                    $f = 3.0;
                    $snowball = Entity::createEntity("PrimedTNT", $player->getLevel(), $nbt, $player);
                    $snowball->setMotion($snowball->getMotion()->multiply($f));
                    $snowball->spawnToAll();   
           }  
if ($item->getCustomName() == "§6Egg") {
	            $x = $block->getX();
                $y = $block->getY() + 2;
                $z = $block->getZ();
                $level->addSound(new PopSound(new Vector3($p->getX(), $p->getY(), $p->getZ())));
                $level->addParticle(new HugeExplodeParticle(new Vector3($x, $y, $z)));
                $level->addParticle(new HugeExplodeParticle(new Vector3($x, $p->getY() + 3, $z)));
                $level->addParticle(new HugeExplodeParticle(new Vector3($x, $p->getY() + 1, $z + 1)));
	
	
	
	
     /**	$nbt = new CompoundTag("", ["Pos" => new ListTag("Pos", [new DoubleTag("", $player->x), new DoubleTag("", $player->y + $player->getEyeHeight()), new DoubleTag("", $player->z) ]), "Motion" => new ListTag("Motion", [new DoubleTag("", -\sin($player->yaw / 180 * M_PI) * \cos($player->pitch / 180 * M_PI)), new DoubleTag("", -\sin($player->pitch / 180 * M_PI)), new DoubleTag("", \cos($player->yaw / 180 * M_PI) * \cos($player->pitch / 180 * M_PI)) ]), "Rotation" => new ListTag("Rotation", [new FloatTag("", $player->yaw), new FloatTag("", $player->pitch) ]) ]);
                $f = 1.0;
                $snowball = Entity::createEntity("Egg", $player->getLevel(), $nbt, $player);
                $snowball->setMotion($snowball->getMotion()->multiply($f));
                $snowball->spawnToAll();
               */
           }                          
     }
}      