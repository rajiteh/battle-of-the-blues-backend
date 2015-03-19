# Battle of The Blues Backend
Provides score updates and analytics for the official BOTB Android application.  
Adapted from 2014 backend done by @chamathpali  
[![Android app on Google Play](https://developer.android.com/images/brand/en_app_rgb_wo_60.png)](https://play.google.com/store/apps/details?id=com.arc.botb)

## Instructions
1. Install `redis` http://redis.io/topics/quickstart  
2. Configure swappiness 
```
//etc/sysctl.conf
vm.swappiness=0
vm.overcommit_memory=1
```
2. Install `phpredis` https://github.com/phpredis/phpredis#installation
3. Enable mysql query caching. http://www.cyberciti.biz/tips/enable-the-query-cache-in-mysql-to-improve-performance.html 
3. Install `supervisord` http://supervisord.org/installing.html  
4. Start workers by `supervisord -c supervisord.conf`  

## Monitoring
1. Supervisord monitoring http://localhost:9001



- `/commentary` : List of commentaries.
- `/stats` : Current match stats.
- `/trigger_push` : Send score push
