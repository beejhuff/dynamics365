<?php
namespace Dfe\Dynamics365\Settings\General;
// 2017-04-23
/** @method static OAuth s() */
final class OAuth extends \Df\OAuth\Settings {
	/**
	 * 2017-07-08 `My Dynamics 365 instance is self-hosted («on-premises»)`
	 * @used-by url_auth()
	 * @used-by url_token()
	 * @return string
	 */
	function on_premises() {return $this->b();}

	/**
	 * 2017-07-08 «On-premises Token Endpoint»
	 * @used-by \Dfe\Dynamics365\Button::url()
	 * @return string
	 */
	function url_auth() {return $this->on_premises() ? $this->v() : self::$SAAS_URL_BASE . 'authorize';}

	/**
	 * 2017-07-08 «On-premises Token Endpoint»
	 * @used-by \Dfe\Dynamics365\OAuth\App::urlToken()
	 * @return string
	 */
	function url_token() {return $this->on_premises() ? $this->v() : self::$SAAS_URL_BASE . 'token';}

	/**
	 * 2017-04-23
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 * @used-by \Df\OAuth\Settings::refreshTokenSave()
	 * @return string
	 */
	protected function prefix() {return 'df_dynamics365/general/oauth';}

	/**
	 * 2017-07-08
	 * @used-by url_auth()
	 * @used-by url_token()
	 * @var string
	 */
	private static $SAAS_URL_BASE = 'https://login.microsoftonline.com/common/oauth2/';
}