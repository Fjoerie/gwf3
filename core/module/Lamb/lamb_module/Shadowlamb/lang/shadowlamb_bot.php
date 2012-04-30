<?php
$lang = array(
'ny2' => '%.02f',
'lvl' => '%s',
'name' => 'NAME',
'none' => 'none',
'over' => 'over',
'items' => 'ITEMS',
'mount' => 'MOUNT',
'unknown' => '?',
'unknown_contr' => '?',
'modifiers' => '%s',
'm' => '', # metres
'g' => '%d', # gram
'kg' => '%.02f', # kilogram
'busy' => '%s', # duration
'eta' => '%s', # duration
'hits1' => '; %s:%s', # player, damage
'hits2' => '; %s:%s:%s:%s', # player, damage, hp left, max hp
'kills' => '; %s:%s', # player, damage
'loot_nyxp' => ',%s,%.02f',
'page' => '%d,%d,%s',
'from_brewing' => 'FRBRW',
'members' => '%d',
'of' => '_of_',
'range' => '%s',
'atk_time' => '%s',
'worth' => '%s',
'weight' => '%s',

'fmt_examine' => '%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s', # Ouch
'fmt_list' => ',%s', # item
'fmt_gain' => '%5$s,%1$s%2$.02f,%3$.02f,%4$.02f', # sign, gain, now, max, unit
'fmt_asl' => '%d,%d,%s', # age, height, weight
'fmt_requires' => '%s', # statted list
'fmt_mods' => ';%s:%s', # stat, value
'fmt_stats' => ',%4$s:%2$s:%5$s', # stat-long, base, (now), stat, now
'fmt_sumlist' => ', %2\$s:%3\$s', # enum, playername, summand
'fmt_cityquests' => ', %s,%.01f', # cityname, percent
'fmt_quests' => ', %2\$d-%3\$s', # boldy, id, name
'fmt_rawitems' => ', %s:%s', # id, itemname
'fmt_items' => ', %1$s:%2$s:%4$s', # id, itemname, (amt), amt
'fmt_itemmods' => ';%s:%s', # stat, value
'fmt_itemindex' => ',%1$s|%2$s|%5$s|%6$s', # id, itemname, dcount, dprice, count, price 
'fmt_effect' => ',%s:%s:%s', # stat, gain, duration
'fmt_equip' => ',%3$s:%2$s', # long type, item, short type
'fmt_hp_mp' => ',%6$s:%1$s:%2$s:%3$s:%4$s', # $member->getEnum(), $member->getName(), $hpmp, $hpmmpm, $b2, $b1
'fmt_spells' => ',%1$s:%2$s:%3$s:%5$s', # id, spellname, base, (adjusted), adjusted
'fmt_lvlup' => ',%1$s:%6$s:%2$s:%3$s', # field, tobase, karma, bold, K, couldbit
'fmt_giveitems' => ',%dx%s', # amt, itemname
'fmt_bazar_shop' => ', %d,%s,%s', # itemcount, itemname, price
'fmt_bazar_shops' => ', %s,%d', # player, itemcount
'fmt_bazar_search' => ', %s,%s,%s,%s', # player, itemname, amount, price

'pa_delete' => 'delete',
'pa_talk' => 'talk,%s,%s', # enemy party, duration,
'pa_fight' => 'fight,%s', # enemy party
'pa_inside' => 'inside,%s', # location
'pa_outside1' => 'outside,%s', # location
'pa_outside2' => 'outside,%s', # location
'pa_sleep' => 'sleep,%s', # location
'pa_travel' => 'travel,%s,%s', # location, duration
'pa_explore' => 'explore,%s,%s', # location, duration
'pa_goto' => 'goto,%s,%s', # location, duration
'pa_hunt' => 'hunt,%s,%s', # location, duration
'pa_hijack' => 'hijack,%s,%s,%s', # playername, location, duration

############
### OOPS ###
############
# Workaround for Shadowclients #
'5005' => '5005:', # append a :
);
?>
