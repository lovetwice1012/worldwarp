<?php

namespace lovetwice1012\daily;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\PlayerJoinEvent;
use pocketmine\command\CommandSender;
use czechpmdevs\multiworld\api\WorldGameRulesAPI;
use czechpmdevs\multiworld\api\WorldManagementAPI;
use czechpmdevs\multiworld\form\CustomForm;
use czechpmdevs\multiworld\MultiWorld;
use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\Server;

class Main extends PluginBase implements Listener
{
    public $data;
    public $plugin;
    public $money;
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        
        
        
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{
        $customForm = new CustomForm("World Manager");
        $customForm->mwId = $data;
        $customForm->addLabel("Teleport to level");
        $customForm->addDropdown("Level", WorldManagementAPI::getAllLevels());
        $player->sendForm($customForm); 
    }  
}
