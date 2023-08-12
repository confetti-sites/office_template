FROM ubuntu:23.04 as tailwindcss_admin

WORKDIR /src
COPY . .

RUN apt-get -y update
RUN apt-get -y install curl

RUN curl -sLO https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64
RUN chmod +x tailwindcss-linux-x64
RUN mv tailwindcss-linux-x64 /bin/tailwindcss

CMD /bin/tailwindcss \
-i /src/view/assets/css/tailwind.css \
-c /src/view/tailwind.config.js \
-o /var/shared_resources/tailwind/tailwind.output.css \
--watch
