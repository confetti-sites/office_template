FROM ubuntu:23.04 as tailwindcss

RUN apt-get -y update
RUN apt-get -y install curl

RUN curl -sLO https://github.com/tailwindlabs/tailwindcss/releases/latest/download/tailwindcss-linux-x64
RUN chmod +x tailwindcss-linux-x64
RUN mv tailwindcss-linux-x64 /bin/tailwindcss

CMD /bin/tailwindcss \
-i view/assets/css/tailwind.css \
-c view/tailwind.config.js \
-o view/tailwind.output.css \
--watch
