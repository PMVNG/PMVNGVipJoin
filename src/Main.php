<?php

declare(strict_types=1);

namespace YTBJero\PMVNGVipJoin;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

	public function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->pprs = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
		$this->saveDefaultConfig();
	}

	public function onJoin(PlayerJoinEvent $event): void {
		$player = $event->getPlayer();
		foreach ($this->getConfig()->getNested("ranks", ["Owner", "Admin"]) as $rank) {
			if ($this->pprs->getUserDataMgr()->getGroup($player)->getName() == $rank) {
				$player->sendMessage("§l§1『 §bWelcome vip §f" . $player->getName() . " §bown rank §f" . $rank . " §bjoined the server.§1 』");
			}
		}
	}
}
