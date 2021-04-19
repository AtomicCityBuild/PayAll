# PayAll Plugin
A simple to use PayAll Plugin for Pocketmine-MP/Altay

This Plugin was originally created by BedrockMine. I just translated it (to something like english).

With this plugin you can give your players the ability to use a /payall command to pay a specific amount of money (EconomyAPI needed) to every player online!

# Commands + Permissions
/payall <amount>
payall.cmd
default: true

/payallinfo
payallinfo.cmd
default: true

Default True means that everyone can use this commands. If you want to use the permissions, please open the plugin.yml and set default to op
It must look like this: 
default: op

# Config:
(Every Hashtag got replaced with //)

> // Payall Plugin by BedrockMine
 
> // This plugin was originally created by BedrockMine, a Server located in Germany.
> 
> // IP: bedrockmine.net
> 
> // Port: 19132

> // Translated to something like english by GermanLetsLPFor :)
> 
> // (I am very sorry for my bad english, hopefully you can use it anyways :D)
> 

> // {name} = Name of player
> 
> // {amount} = Amount of dollars the player pay to everyone
> 


> // the minimum amount a player has to pay
> 
> minimum_amount_to_pay: 10
> 

> // The message, which will send to the player if he does not have enough money
> 
> message_minmumpay_not_reached: §cYou need to payall at least 10$!
> 

> // The minimum amount a player must have to use payall
> 
> minimum_amount_to_have: 250
> 

> // The message if the player does not have enough money!
> 
> message_minimumhave_not_reached: §cYou do not have enough money!
> 

> // The public message if a player used payall successfull!
> 
> message_payall_public: §e{name} §apayed §e{amount}$ §ato everybody! :D
> 

> // The pupup if a player payed dollars using payall. (to a player who got the money lol)
> 
> popup_payall: §c{name} §apayed §c{amount}$ §ato you!
> 

> // End of Config (yay)
> 

# Last word:
I want to try to use this foundation to make it better. But BedrockMine will be the original author forever! :)
