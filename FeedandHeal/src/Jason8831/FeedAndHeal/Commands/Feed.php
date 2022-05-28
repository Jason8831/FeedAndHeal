<?php

namespace Jason8831\FeedAndHeal\Commands;

use Jason8831\FeedAndHeal\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class Feed extends Command
{

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);

        if($sender instanceof Player) {
            if($sender->hasPermission("feed.use")) {
                $sender->getHungerManager()->setFood(20);
                $sender->getHungerManager()->setSaturation(20);
                $sender->sendMessage($config->get("msgfeed"));
            }else{
                $sender->sendMessage($config->get("msgnoperm"));
            }
        }else{
            $sender->sendMessage("§f[§l§4ERROR§r§f]: vous ne pouvez pas d'éxécuter cette commande");
        }
    }
}