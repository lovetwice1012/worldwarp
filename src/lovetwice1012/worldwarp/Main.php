<?php

namespace lovetwice1012\worldwarp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\form\Form;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use lovetwice1012\worldwarp\WMAPI;
use lovetwice1012\worldwarp\CustomForm;

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
	if(!$sender instanceof Player) {
                $sender->sendMessage("ワールド内から実行してください。");
                return true;
        }
        $customForm = new CustomForm("world warp");
        $customForm->addLabel("[ワールド間転送]行きたいワールドを選択してください。");
        $customForm->addDropdown("Level", WMAPI::getAllLevels());
        $sender->getServer()->getPlayer($sender->getName())->sendForm($customForm); 
        return true;
    }  
    public static function handleCustomFormResponse(Player $player, $data, CustomForm $form) {
        if($data === null){
            return;
	}
	
	$levelsname = WMAPI::getAllLevels()[$data[1]];
	if(!Server::getInstance()->isLevelGenerated($levelsname)) {
            $player->sendMessage("このワールドは存在しません！");
            return;
        }

        if(!Server::getInstance()->isLevelLoaded($levelsname)) {
            Server::getInstance()->loadLevel($levelsname);
        }

        $level = Server::getInstance()->getLevelByName($levelsname);

        $player->teleport($level->getSafeSpawn());
        $player->sendMessage($levelsname."に転送しました。");
        return;
    }
}
