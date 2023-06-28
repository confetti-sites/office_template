FROM ubuntu:23.04 as tailwindcss

WORKDIR /etc

RUN apt-get -y update
RUN apt-get -y install curl

RUN curl -sLO https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64
RUN chmod +x tailwindcss-linux-x64
RUN mv tailwindcss-linux-x64 tailwindcss

CMD cd /var/repository && /etc/tailwindcss \
-i /var/repository/view/assets/css/tailwind.css \
-c /var/repository/view/tailwind.config.js \
-o /var/generated/view/tailwind.output.css \
--watch
