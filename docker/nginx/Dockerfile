FROM nginx:1.19-alpine
SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]
ENV TZ=UTC

RUN apk update && \
  apk add --update --no-cache --virtual=.build-dependencies g++

COPY --from=node:14.15-alpine /usr/local/bin /usr/local/bin
COPY --from=node:14.15-alpine /usr/local/lib /usr/local/lib
COPY --from=node:14.15-alpine /opt /opt

# nginx config file
COPY ./docker/nginx/*.conf /etc/nginx/conf.d/

WORKDIR /var/www/html