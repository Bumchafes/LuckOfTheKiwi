# Image that we will use.
#FROM gcc:7.2.0
# Copy from src/ into /usr/src/myapp in the container.
#COPY  src/ /usr/src/myapp
# Set the Working Directory to /usr/src/myapp in future references as `.`
#WORKDIR /usr/src/myapp
# Compiles the C program into an executable.
#RUN gcc -o myapp main.c connWBC.c
# Installs SSH Library for Eth Communication
#RUN apt-get update && apt-get install -y git libssh2-1 libssh2-1-dev
# When container starts up, run the executable myapp.
#ENTRYPOINT ["./myapp"]

FROM node:carbon
# CReate app directory 
WORKDIR /usr/src/app
# Install app dependancies 
# A wild card is used to to ensure both package.json and package-lock.json are copied 
# Where available (npm@5+)
COPY ./package*.json ./
# Copy from src/ into /var/www/html in the container.
#COPY src/ /var/www/html
RUN npm install
# If you are building your code for production 
# run npm install --only=production
# Bundle app source 
COPY . .
# Start the app
CMD ["npm", "start"]

# Image that we will use.
#FROM php:7.2.1-apache
# Copy from src/ into /var/www/html in the container.
#COPY src/ /var/www/html
# Opens port 80 on the container.
#EXPOSE 8001
