FROM ubuntu:23.04 as tailwindcss_admin

WORKDIR /src2
COPY . .

RUN apt-get -y update
RUN apt-get -y install curl


RUN pwd
RUN ls -la

RUN curl -sLO https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64
RUN chmod +x tailwindcss-linux-x64
RUN mv tailwindcss-linux-x64 /bin/tailwindcss

CMD /bin/tailwindcss \
-i assets/css/tailwind.css \
-c tailwind.config.js \
-o tailwind.output.css \
--watch
