<table>
	<tr>
		<th>{$SF->lang('visitor')|upper}</th>
		<th>{$SF->lang('surfer_infos')|upper}</th>
		{*<th>{$SF->lang('statistics')|upper}</th>
<th>{$SF->lang('server')|upper}</th>
		<th>{$SF->lang('donations')|upper}</th>*}
	</tr>
	<tr>
		<td>
			{$SF->lang('ct_online_atm', array($SF->getOnlineUsers()))}<br>
			{$SF->lang('ct_vis_total')}<br>
			{$SF->lang('ct_vis_today')}<br>
			{$SF->lang('ct_vis_yesterday')}<br>
			{$SF->lang('ct_online_today')}<br>
			{$SF->lang('ct_online_total')}<br>
		</td>
		<td>
            {*$lang['screen_resolution']}: <span class="color"><script language="JavaScript"> <!-- document.write(screen.width+'x'+screen.height) //--> </script> Pixel</span><br> {*}
			<span class="color">{$SF->langA('si', 'country', array($SF->imgCountry(), $SF->getCountry()))}</span><br/>
			<span class="color">{$SF->langA('si', 'ip', array(GWF_ClientInfo::getIPAddress()))}</span><br/>
			<span class="color">{$SF->langA('si', 'operating_system', array(GWF_ClientInfo::imgOperatingSystem(), GWF_ClientInfo::displayOperatingSystem()))}</span><br/>
			<span class="color">{$SF->langA('si', 'browser', array(GWF_ClientInfo::imgBrowser(), GWF_ClientInfo::displayBrowser()))}</span><br/>
			<span class="color">{$SF->langA('si', 'provider', array(GWF_ClientInfo::imgProvider(), GWF_ClientInfo::displayProvider()))}</span><br/>
			<span class="color">{$SF->langA('si', 'hostname', array(GWF_ClientInfo::getHostname()))}</span><br/>
			<span class="color">{$SF->langA('si', 'referer', array(GWF_ClientInfo::getReferer()))}</span><br/>
			<span class="color">{$SF->langA('si', 'user_agent', array(GWF_ClientInfo::getUserAgent()))}</span>
		</td>{*
		<td>
			There are 5 new Challenges:<br/>
			3 in Cryptography<br/>
			2 in Steganography<br/>
		</td>
		<td>
			No Donators, yet...<br/>
{include file='tpl/Form/donate.tpl'}
		</td
Designswitch
>*}
	</tr>
</table>
