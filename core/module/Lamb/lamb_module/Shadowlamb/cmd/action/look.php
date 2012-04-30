<?php
final class Shadowcmd_look extends Shadowcmd
{
	public static function execute(SR_Player $player, array $args)
	{
		$bot = Shadowrap::instance($player);
		$p = $player->getParty();
		$pid = $player->getPartyID();
		
		$format = $player->lang('fmt_list');
		$back = '';
		foreach (Shadowrun4::getParties() as $party)
		{
			$party instanceof SR_Party;
			
			if ($party->getID() === $pid)
			{
				continue;
			}
			
			if (!$party->sharesLocation($p))
			{
				continue;
			}
			
			foreach ($party->getMembers() as $member)
			{
				$member instanceof SR_Player;
				if ($member->isHuman())
				{
					$back .= sprintf($format, $member->getName());
// 					$back .= sprintf(', %s', $member->getName());
				}
			}
		}
		
		if ($back === '')
		{
			return self::rply($player, '5120');
// 			$bot->reply('You see no other players.');
		}
		else
		{
			$player->setOption(SR_Player::RESPONSE_PLAYERS);
			return self::rply($player, '5121', array(ltrim($back, ',; ')));
// 			$bot->reply(sprintf('You see these players: %s.', substr($back, 2)));
		}
		
		return true;
	}
}
?>
