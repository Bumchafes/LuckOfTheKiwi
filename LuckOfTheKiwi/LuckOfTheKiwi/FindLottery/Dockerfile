# Image that we will use.
FROM gcc:7.2.0
# Copy from src/ into /usr/src/myapp in the container.
COPY  src/ /usr/src/myapp
# Set the Working Directory to /usr/src/myapp in future references as `.`
WORKDIR /usr/src/myapp
# Compiles the C program into an executable.
RUN gcc -o myapp main.c
# When container starts up, run the executable inside /myapp.
CMD [".\myapp"]
