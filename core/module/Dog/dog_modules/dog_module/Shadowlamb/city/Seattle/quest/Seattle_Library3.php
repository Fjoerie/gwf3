<?php
final class Quest_Seattle_Library3 extends SR_Quest
{
	public function getNeededAmount() { return 2; }
	
// 	public function getQuestName() { return 'Studies3Finals'; }
// 	public function getQuestDescription() { return sprintf('Bring %s/%s ElvenStaffs to the gnome in the Seattle Library', $this->getAmount(), $this->getNeededAmount()); }
	public function getQuestDescription() { return $this->lang('descr', array($this->getAmount(), $this->getNeededAmount())); }
	
	public function checkQuest(SR_NPC $npc, SR_Player $player)
	{
		$have = $this->getAmount();
		$need = $this->getNeededAmount();
		$have = $this->giveQuesties($player, $npc, 'ElvenStaff', $have, $need);
		$this->saveVar('sr4qu_amount', $have);
		
		if ($have >= $need)
		{
			$npc->reply($this->lang('thx1'));
// 			$npc->reply('Thank you so much. Now I can test my spells with new powerful elven staffs.');
			$player->message($this->lang('thx2'));
// 			$player->message('The gnome returns to work.');
			$player->message($this->lang('thx3'));
// 			$player->message('You tap the gnome on his shoulder and remind him of a reward...');
			$npc->reply($this->lang('thx4'));
// 			$npc->reply('What? Oh yes, the magic spell. I remember now ... ');
			$player->message($this->lang('thx5'));
// 			$player->message('The gnome teaches you a new magic spell: teleport.');
			$player->levelupSpell('teleport');
			return $this->onSolve($player);
		}
		
		else
		{
			$npc->reply($this->lang('more', array($have, $need)));
// 			$npc->reply(sprintf('I still need %d of %d ElvenStaffs ... come back later.', $have, $need));
			return false;
		}
	}
	
}
?>