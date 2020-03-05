<?php
namespace islandadds;

use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use islandadds\delaytask;

class adds extends PluginBase implements Listener{
    public function onEnable(){
        $this->getLogger()->info("空岛拓展加载完成");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }

    public function onInt(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        $item = $event->getItem();
        $block = $event->getBlock();
        if($item->getId() == 325 && $item->getDamage() == 0){
            if($block->getId() == 49 && $item->getDamage() == 0){
                if($player->isSneaking()){
                    $block->getLevel()->setBlock($block, new Block(0, 0));
                    $player->getInventory()->removeItem(Item::get("325","0","1"));
                    $this->getScheduler()->scheduleDelayedTask(new delaytask($event),5);
                }
            }
        }
    }
}