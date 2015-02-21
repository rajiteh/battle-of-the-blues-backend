<?php

/*
 * Battle of the Blues Backend
 *
 */

class Cache {
	protected $redis;

	public function __construct($redisDsn) {
		$url = parse_url($redisDsn);
        $this->redis = new Redis();
        $this->redis->pconnect($url['host'], $url['port']);
        if (!empty($url['pass'])) {
        	$this->redis->auth($url['pass']);
        }
        if (!empty($url['path'])) {
        	$db = (int) ltrim($url['path'], '/');
        	$this->redis->select((int) $db);
        }
        if (defined('Redis::SERIALIZER_IGBINARY')) {
        	$this->redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_IGBINARY);
        }
		$this->redis->setOption(Redis::OPT_PREFIX, 'botb:');
    }

    public function generateCacheKey() {
    	$req = $_REQUEST;
    	unset($req["id"]);
    	unset($req["callback"]);
    	$wot = $_SERVER["REQUEST_METHOD"].implode(":",array_keys($req)).implode(":",$req);
    	error_log("CACHE KEY " . $wot);
        return md5($wot);
    }

    public function get($cacheKey) {
        if ($cacheKey === false)
        	return false;
        $data = unserialize($this->redis->get($cacheKey));
        if ($data === false) {
        	return false;
        } else {
        	return $data;
        }
    }

    public function set($cacheKey, $object) {
        $this->redis->setex($cacheKey, 30, serialize($object));
    }
}
