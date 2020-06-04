<?php

namespace lovetwice1012\worldwarp;

use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use lovetwice1012\worldwarp\WMAPI;
use lovetwice1012\worldwarp\CustomForm;
use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\Server;

class Main extends PluginBase implements Listener
{
    public $data;
    public $plugin;
    public $Main;
    public function onEnable()
    {	
        $this->getServer()->getPluginManager()->registerEvents($this, $this);      
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args):bool
	{
        $customForm = new CustomForm("World Manager");
        $customForm->addLabel("Teleport to level");
        $customForm->addDropdown("Level", WMAPI::getAllLevels());
        Player::$sender->getPlayer()->sendForm($customForm); 
    return true;
    }  
    public static function handleCustomFormResponse(Player $player, $data, CustomForm $form) {
        if($data === null) return;
                Server::getInstance()->dispatchCommand(new ConsoleCommandSender(), 'mw tp "' . WMAPI::getAllLevels()[$data[1]].'" '.$player->getName());               
    }
    
}
