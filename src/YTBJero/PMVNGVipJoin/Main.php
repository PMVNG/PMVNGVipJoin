<?php 

declare(strict_types=1);

namespace YTBJero\PMVNGVipJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\command\{Command, CommandSender};
use pocketmine\Player;
use pocketmine\Server;
class Main extends PluginBase implements Listener{
	
	public $pprs;

	public function onEnable(): void 
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->pprs = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
		$this->saveDefaultConfig();
		if($this->pprs == null){
			$this->getLogger()->error("Download the pureperms plugin at https://poggit.pmmp.io/p/PurePerms and try again.");
			$this->getServer()->getPluginManager()->disablePlugin($this);
		}
	}

	public function onJoin(PlayerJoinEvent $event)
	{
		$player = $event->getPlayer();
		foreach ($this->getConfig()->getNested("groups") as $rank) {
			if($this->pprs->getUserDataMgr()->getGroup($player)->getName() == $rank)
			{
			$player->sendMessage("§l§1『 §bWelcome vip §f". $player->getName() ." §bown rank §f". $rank ." §bjoined the server.§1 』");
		    }
		}
	}
}
