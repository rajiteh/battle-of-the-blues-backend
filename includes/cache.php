<?php

/*
 * Battle of the Blues Backend
 *
 */

class Cache {
	protected $redis;

	public function __construct($dsn) {
		$conn = parse_url($dsn);
        $this->redis = new Redis();
        $this->redis->pconnect($conn['host'],(int) $conn['port']);
        //$this->redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_IGBINARY);
		$this->redis->setOption(Redis::OPT_PREFIX, 'botb:');
    }

    public function generateCacheKey() {
    	$req = $_REQUEST;
    	unset($req["id"]);
        return md5($_SERVER["REQUEST_METHOD"].implode(":",$req));
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
