<?php
namespace islandadds;

use pocketmine\item\Item;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;


class delaytask extends Task{

    protected $player;
    protected $block;

    public function __construct($event){
        $this->player = $event->getPlayer();
        $this->block = $event->getBlock();
    }

    public function onRun($t){
        //$this->block->getLevel()->setBlock($this->block, new Block(0, 0));
        //$this->player->getInventory()->setItemInHand(Item::get(325, 10, 1));
        $this->player->getInventory()->addItem(Item::get("325","10","1"));
        $this->player->sendMessage(TextFormat::GREEN . ">>" . TextFormat::YELLOW . "已将黑曜石还原为岩浆.下次要小心一点哦");
    }
}