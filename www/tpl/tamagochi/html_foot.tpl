
<!-- FastLoaders Ninja -->
	<script src="{$root}tpl/tamagochi/bower_components/angular/angular.js"></script>
	<script src="{$root}tpl/tamagochi/bower_components/angular-animate/angular-animate.js"></script>
	<script src="{$root}tpl/tamagochi/bower_components/angular-aria/angular-aria.js"></script>
	<script src="{$root}tpl/tamagochi/bower_components/angular-messages/angular-messages.js"></script>
	<script src="{$root}tpl/tamagochi/bower_components/angular-ui/build/angular-ui.js"></script>
	<script src="{$root}tpl/tamagochi/bower_components/angular-ui-router/release/angular-ui-router.js"></script>
	<script src="{$root}tpl/tamagochi/bower_components/angular-material/angular-material.js"></script>

	<script src="{$root}tpl/tamagochi/js/tamagochi.js"></script>

	<script src="{$root}tpl/tamagochi/js/srvc/RequestInterceptor.js"></script>
	<script src="{$root}tpl/tamagochi/js/srvc/RequestSrvc.js"></script>

	<script src="{$root}tpl/tamagochi/js/ctrl/LoginCtrl.js"></script>
	<script src="{$root}tpl/tamagochi/js/ctrl/TGCCtrl.js"></script>
	
	<script>
		angular.element(document).ready(function() { angular.bootstrap(document.body, ['tgc']); });
	</script>

</body>
