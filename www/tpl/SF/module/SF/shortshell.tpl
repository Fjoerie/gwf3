{$logo}
<form method="GET" action="{$root}index.php">
	<p class="shell">
		<span class="bold shell_{if $user->isAdmin()}admin{else}user{/if}">{$user->displayUsername()}@{$smarty.server.SERVER_NAME}</span>
		<span class="bold shell_dir">{$smarty.server.REQUEST_URI|escape}{if $user->isAdmin()} # {else} $ {/if}</span>
		<input type="text" size="8" value="cmd" name="cmd" class="shell border">
		<input type="hidden" name="mo" value="SF">
		<input type="hidden" name="me" value="Shell">
		<input type="submit" value=" " name="submit" class="shell">
		<br/><br/>
	</p>
</form>
