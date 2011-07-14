<?php
final class Seattle_Store extends SR_Store
{
	public function getFoundText(SR_Player $player) { return 'You find a small Store. There are no employees as all transactions are done by slot machines.'; }
	public function getFoundPercentage() { return 50.00; }
	
	public function getNPCS(SR_Player $player)
	{
		$quest = SR_Quest::getQuest($player, 'Seattle_IDS');
		if ($quest->isDone($player))
		{
			return array('talk'=>'Seattle_DElve2');
		}
		else
		{
			return parent::getNPCS($player);
		}
	}
	public function getEnterText(SR_Player $player)
	{
		$quest = SR_Quest::getQuest($player, 'Seattle_IDS');
		if ($quest->isDone($player))
		{
			return 'You enter the Seattle Store. No employees are around. In front of a slot machine you see Malois.';
		}
		else
		{
			return 'You enter the Seattle Store. No people or employees are around.';
		}
		
	}
	public function getHelpText(SR_Player $player)
	{
		$c = Shadowrun4::SR_SHORTCUT; 
		$quest = SR_Quest::getQuest($player, 'Seattle_IDS');
		if ($quest->isDone($player))
		{
			return parent::getHelpText($player)." Use {$c}talk to talk to Malois.";
		}
		else
		{
			return parent::getHelpText($player);
		}
	}
	
	public function getStoreItems(SR_Player $player)
	{
		return array(
			array('Stimpatch', 100.0, 1000),
			array('Ether', 100.0, 1000),
			array('AimWater', 100.0, 500),
			array('StrengthPotion', 100.0, 300),
			array('QuicknessElixir', 100.0, 400),
			array('Scanner_v2'),
			array('Credstick'),
			array('Backpack', 100.0, 350),
			array('RacingBike', 100.0, 950),
		);
	}
}
?>
