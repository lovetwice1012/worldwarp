<?php

namespace lovetwice1012\worldwarp;

use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\command\CommandSender;
use czechpmdevs\multiworld\api\WorldGameRulesAPI;
use czechpmdevs\multiworld\api\WorldManagementAPI;
use lovetwice1012\worldwarp\CustomForm;
use czechpmdevs\multiworld\MultiWorld;
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
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{
        $customForm = new CustomForm("World Manager");
        $customForm->addLabel("Teleport to level");
        $customForm->addDropdown("Level", WorldManagementAPI::getAllLevels());
        $sender->getPlayer()->sendForm($customForm); 
    }  
    public function handleCustomFormResponse(Player $player, $data, CustomForm $form) {
        if($data === null) return;
                $this->plugin->getServer()->dispatchCommand(new ConsoleCommandSender(), "mw tp " . WorldManagementAPI::getAllLevels()[$data[1]]);               
    }
    public static function getInstance() {
        return $this;
    }
}
