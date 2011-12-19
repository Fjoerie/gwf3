<?php
final class Delaware_DJohnson extends SR_TalkingNPC
{
	public function getName() { return 'Mr.Johnson'; }
	public function getNPCQuests(SR_Player $player) { return array('Delaware_DallasJ1','Delaware_DallasJ2','Delaware_DallasJ3','Delaware_DallasJ4'); }
	public function onNPCTalk(SR_Player $player, $word, array $args)
	{
		if ($this->onNPCQuestTalk($player, $word))
		{
			return true;
		}
		
		$b = chr(2);
		switch ($word)
		{
			case 'bounty':
				if ($this->onNPCBountyTalk($player, $word, $args))
				{
					return true;
				}
				return $this->reply('You want to become a bountyhunter?');
				
			case 'renraku':
				return $this->reply('I think we are currently not contracting with Renraku.');
				
			case 'malois':
				return $this->reply('Listen chummer, it is not your business, and i would not put my hands in corp business like Renraku');
				
			default:
				$this->reply("Yo chummer");
				return true;
		}
		
	}
}
?>