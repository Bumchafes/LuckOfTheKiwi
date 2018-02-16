FROM node:carbon
# CReate app directory 
#WORKDIR /usr/src/app
# Install app dependancies 
# A wild card is used to to ensure both package.json and package-lock.json are copied 
# Where available (npm@5+)
#COPY ./package*.json ./
# Copy from src/ into /var/www/html in the container.
#COPY src/ /var/www/html
#RUN npm install
# If you are building your code for production 
# run npm install --only=production
# Bundle app source 
#COPY . .
# Start the app
#EXPOSE 8001

# Image that we will use.
#FROM php:7.2.1-apache
# Copy from src/ into /var/www/html in the container.
COPY src/ /var/www/html
# Opens port 80 on the container.
EXPOSE 8001
