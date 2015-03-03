<?php

class Config {
	const DATABASE_STRING = 'mysql:host=localhost;dbname=botb;charset=utf8',
		  DATABASE_USER = 'botb',
		  DATABASE_PASSWORD = 'botb',
		  DEBUG = '0',
		  REDIS_DSN = 'redis://localhost:6379/0',
          CACHE_TTL = 30,
          SUBSCRIBER_TTL = 60,
          PUSHWOOSH_APP = '***REMOVED***',
          PUSHWOOSH_TOKEN = '***REMOVED***';
		  //PUSHWOOSH_APP = '***REMOVED***',
          //PUSHWOOSH_TOKEN = '***REMOVED***';

}