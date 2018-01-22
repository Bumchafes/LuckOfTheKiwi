FROM gcc:7.2.0
COPY  src/ /usr/src/myapp
WORKDIR /usr/src/myapp
RUN gcc -o myapp main.c
CMD ["./myapp/"]