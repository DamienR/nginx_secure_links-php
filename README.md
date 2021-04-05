# nginx_secure_links-php
Simple Nginx ngx_http_secure_link_module and PHP

```
before: https://https://mydomain.com/data/videos/file.mp4
after : https://mydomain.com/data/videos/file.mp4?md5=Vtzs2WCnCqRsE47EH6U6pQ&expires=1617601227
```

- Video files under /data/videos
- expiry time 15 seconds for testing
- nginx config for domain include

```
etc/
└── nginx/
    └── snippets/ssl.conf
```
