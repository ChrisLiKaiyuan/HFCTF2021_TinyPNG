FROM php:7.2-apache

# RUN sed -i s@/deb.debian.org/@/mirrors.tuna.tsinghua.edu.cn/@g /etc/apt/sources.list && \
#     apt-get clean && \
#     apt-get update

COPY flag /flag
RUN chmod 777 /flag

COPY web/default.conf /default.conf
COPY web/ports.conf /ports.conf

WORKDIR /var/www/html

COPY web/start.sh /start.sh
RUN chmod 777 /start.sh
CMD /start.sh