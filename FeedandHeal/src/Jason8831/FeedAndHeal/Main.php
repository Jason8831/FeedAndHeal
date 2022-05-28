<?php

namespace Jason8831\FeedAndHeal;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

    public Config $config;

    /**
     * @var Main
     */
    private static $instance;

    public function onEnable(): void
    {

        self::$instance = $this;

        $this->getLogger()->info("§f[§l§4FeedAndHeal§r§f]: activée");
        $this->saveResource("config.yml");

        $this->getServer()->getCommandMap()->registerAll("AllCommands", [
            new Commands\Feed(name: "feed", description: "permet de ce nourrir", usageMessage: "feed", aliases: ["food"]),
            new Commands\Heal(name: "heal", description: "permet de ce heal", usageMessage: "heal", aliases: ["heal", "life"])
        ]);

    }

    public static function getInstance(): self{
        return self::$instance;
    }
}