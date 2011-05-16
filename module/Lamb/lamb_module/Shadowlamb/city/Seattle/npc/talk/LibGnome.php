<?php
final class Seattle_LibGnome extends SR_TalkingNPC
{
	const TEMP_WORD = 'Seattle_LibGnome_TW';
	
	public function getName() { return 'Federico'; }
	
	public function onNPCTalk(SR_Player $player, $word)
	{
		$b = chr(2);
		$quests = array(
			SR_Quest::getQuest($player, 'Seattle_Library1'),
			SR_Quest::getQuest($player, 'Seattle_Library2'),
			SR_Quest::getQuest($player, 'Seattle_Library3'),
		);
		$q = false;
		$i = -1;
		foreach ($quests as $id => $quest)
		{
			$quest instanceof SR_Quest;
			if(!$quest->isDone($player)) {
				$q = $quest;
				$i = $id;
				break;
			}
		}
		$has = $q === false ? false : $q->isInQuest($player);
		$t = $player->hasTemp(self::TEMP_WORD);
		
		switch ($word)
		{
			case 'invite':
				$this->reply('I have no time for parties, i have to study the powers of magic.');
				$player->giveKnowledge('words', 'Magic');
				break;
				
			case 'magic':
				$this->reply('I am studying the powers of magic for a long time. If you help me out with some stuff i will teach you my most powerful spell.');
				break;
				
			case 'cyberware':
				$this->reply('Cyberware will make you a bad magician. I would not recommend to use that kinda equipment. Please stop to interrupt my research now.');
				break;
				
			case 'redmond':
				$this->reply('Redmond is a slum city. No magic people there. Not of interest to me.');
				break;
				
			case 'seattle':
			case 'blackmarket':
				$this->reply('Could you please stop asking useless questions? Can\'t you see i am busy?');
				break;
			
			case 'yes':
				if ($t === true) {
					$q->accept($player);
					$this->reply('Thank you. Now go and bring me the stuff.');
					$player->unsetTemp(self::TEMP_WORD);
				} else {
					$player->message('The gnome doesn\'t react.');
				}
				break;
				
			case 'no':
				if ($t === true) {
					$player->message('The gnome continues his study work.');
					$player->unsetTemp(self::TEMP_WORD);
				} else {
					$player->message('The gnome doesn\'t react.');
				}
				break;
				
			case 'shadowrun':
				if ($q === false) {
					$this->reply('Thank you again for your help chummer.');
				}
				elseif ($has === true) {
					$q->checkQuest($this, $player);
				}
				elseif ($t === true) {
					$this->reply('Could you please bring me the items? I will teach you a cool magic spell as reward.');
				}
				elseif ($i === 0) {
					$this->reply('Oh yes i have an important job for you. I have not eaten anything for days. Could you please bring me '.$q->getNeededAmount().' Pringles?');
					$this->reply('I will teach you a great magic spell then. What do you think?');
					$player->setTemp(self::TEMP_WORD, true);
				}
				elseif ($i === 1) {
					$this->reply('Magic spell? I could teach you one if you bring me '.$q->getNeededAmount().' bacon. What do you think?');
					$player->setTemp(self::TEMP_WORD, true);
				}
				elseif ($i === 2) {
					$this->reply('Magic spell? I never said that. But i will teach you one if you bring me '.$q->getNeededAmount().' ElvenStaffs. Accept?');
					$player->setTemp(self::TEMP_WORD, true);
				}
				break;
				
			default:
			case 'hello':
				if ($q === false) {
					$this->reply('Thank you again for your help chummer.');
				}
				elseif ($has === true) {
					$q->checkQuest($this, $player);
				}
				else {
					$this->reply(sprintf('Hello chummer. My name is %s. As you can see i am busy. Also be quiet here!', $this->getName()));
				}
				break;
		}
	}
}
?>