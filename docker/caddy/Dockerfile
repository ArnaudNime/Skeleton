FROM caddy:2-alpine

COPY Caddyfile /etc/caddy/Caddyfile

WORKDIR /www

CMD ["caddy", "run", "--config", "/etc/caddy/Caddyfile", "--adapter", "caddyfile"]