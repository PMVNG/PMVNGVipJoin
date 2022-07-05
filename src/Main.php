<?php

declare(strict_types=1);

namespace DavidGlitch04\PMVNGVipJoin;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

	protected $pprs;

	const DEFAULT_MESSAGE = "Welcome [{rank}] {name} to the server!";

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->pprs = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
		$this->saveDefaultConfig();
	}

	public function onJoin(PlayerJoinEvent $event): void {
		$player = $event->getPlayer();
		foreach ($this->getConfig()->getNested("ranks", ["Owner", "Admin"]) as $rank) {
			if ($this->pprs->getUserDataMgr()->getGroup($player)->getName() == $rank) {
				$replacements = [
					"{name}" => $player->getName(),
					"{rank}" => $rank,
				];
				$message = str_replace(
					array_keys($replacements),
					array_values($replacements),
					$this->getConfig()->get("message", self::DEFAULT_MESSAGE)
				);
				$player->sendMessage($message);
			}
		}
	}
}
