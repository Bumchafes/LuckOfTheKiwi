FROM node:carbon
# CReate app directory 
WORKDIR /usr/src/app
# Install app dependancies 
# A wild card is used to to ensure both package.json and package-lock.json are copied 
# Where available (npm@5+)
COPY ./package*.json ./
RUN npm install
# If you are building your code for production 
# run npm install --only=production
# Bundle app source 
COPY . .
# Start the app
CMD [" npm", "start"] 
