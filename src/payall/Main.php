<?php


namespace payall;


use pocketmine\block\Dandelion;
use pocketmine\block\Thin;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        @mkdir($this->getDataFolder());

        $this->saveResource("config.yml");
        $this->saveDefaultConfig();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "payall":
                if (!$sender instanceof Player) {
                    $sender->sendMessage("Please use this command in game!");
                    return true;
                }
                if (empty($args[0])) {
                    $sender->sendMessage("§cNo arguments given! use /payall <amount>");
                    return false;
                }

                $money = EconomyAPI::getInstance()->myMoney($sender);
                $amount = $args[0];
                $count = count($this->getServer()->getOnlinePlayers());
                $name = $sender->getName();
                if ($amount < ($this->getConfig()->get("minimum_amount_to_pay"))){
                    $sender->sendMessage($this->getConfig()->get("message_minmumpay_not_reached"));
                    return true;
                }
                if ($money < ($this->getConfig()->get("minimum_amount_to_have") * $count)){
                    $sender->sendMessage($this->getConfig()->get("message_minimumhave_not_reached"));
                    return true;
                }
                foreach ($this->getServer()->getOnlinePlayers() as $p) {
                    $cfgmoneyamount = $this->getConfig()->get("message_payall_public");
                    $message = str_replace("{amount}", $amount, str_replace("{name}", $name, $cfgmoneyamount));
                    $p->sendMessage($message);

                    $cfgpopup = $this->getConfig()->get("popup_payall");
                    $message = str_replace("{amount}", $amount, str_replace("{name}", $name, $cfgpopup));
                    $p->sendPopup($message);
                    EconomyAPI::getInstance()->addMoney($p, $amount);
                }
                EconomyAPI::getInstance()->reduceMoney($sender, $amount * $count);
                return true;

            case "payallinfo":
                if ($sender instanceof Player){
                    $sender->sendMessage("§aA simple to use Payall Plugin! :)\n \n§l§3Creator:\n§7§lBedrockMine Network\n§r§3Translator: §7GermanLetsLPFor\n \n§8(No more advertisements anymore because they are bad!)");
                }
                return true;
        }
    }
}

     //For my part, I liked it to translate this plugin to something like english. If you like this plugin, give a big hug to
	 //the BedrockMine Network! They created this plugin, I just tried to translate it bcuz of just4fun.
	 //I know, there wont be a lot of people seeing this, but anyways, I want to write something inside here.
	 //I translated it, because I was bored and I love this plugin. It should be usable for the public.
	 
	 //BedrockMine:
	 //IP: bedrockmine.net
	 //Port: 19132
	 
	 //My Server (GermanLetsLPFor)
	 //IP: play.atomiccb.de
	 //Port: 19132