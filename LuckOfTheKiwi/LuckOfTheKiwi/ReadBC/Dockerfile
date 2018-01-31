# Image that we will use.
FROM ubuntu:16.04

# Sets up things for Etherium ??
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install --yes software-properties-common
RUN set -x add-apt-repository ppa:ethereum/ethereum
RUN set -x apt-get update && set -x apt-get install --yes geth
RUN adduser --disabled-login --gecos "" eth_user
USER eth_user

# Sets the Working Directory to /home/eth_user.
WORKDIR /home/eth_user
# The entry point which the container will run.
ENTRYPOINT bash