FROM gcc:7.2.0
COPY  src/ /usr/src/myapp
WORKDIR /usr/src/myapp
RUN set -x gcc -o myapp main.c
CMD ["./myapp"]