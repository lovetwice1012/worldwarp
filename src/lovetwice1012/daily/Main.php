<?php

namespace lovetwice1012\daily;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\PlayerJoinEvent;
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
    
    
            
            
            
            
         

        
    
}
