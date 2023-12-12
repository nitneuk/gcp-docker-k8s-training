ARG NGINX_VERSION=1.25

FROM nginx:${NGINX_VERSION}
RUN apt-get update ; \
    apt-get install wget
LABEL maintainer=quentin
ENV TOTO=tata
COPY --from=composer:2 /usr/bin/composer .
WORKDIR /usr/share/nginx/html
COPY static .
EXPOSE 81
