<?php
/**
 * Name: Cat Avatar Generator
 * Description: Generate a default avatar based on David Revoy's cat-avatar-generator https://framagit.org/Deevad/cat-avatar-generator
 * Version: 1.1
 * Author: Fabio <https://kirgroup.com/profile/fabrixxm>
 */
use Friendica\Core\Addon;
use Friendica\Core\Config;
use Friendica\Core\L10n;

/**
 * Installs the addon hook
 */
function catavatar_install() {
	Addon::registerHook('avatar_lookup', 'addon/cat-avatar/cat-avatar.php', 'catavatar_lookup');

	logger("registered cat-avatar in avatar_lookup hook");
}

/**
 * Removes the addon hook
 */
function catavatar_uninstall() {
	Addon::unregisterHook('avatar_lookup', 'addon/catavatar/catavatar.php', 'catavatar_lookup');

	logger("unregistered cat-avatar in avatar_lookup hook");
}

/**
 * Returns the URL to the cat avatar
 *
 * @param $a array
 * @param &$b array
 */
function catavatar_lookup($a, &$b) {
	$hash = md5(trim(strtolower($b['email'])));

	$url = $a->get_baseurl().'/addon/cat-avatar/cat-avatar-generator/cat-avatar-generator.php?seed=' .$hash;

	$b['url'] = $url;
	$b['success'] = true;
}

