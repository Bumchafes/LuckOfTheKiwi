FROM cityofzion/neo-privatenet

EXPOSE 20333-20336:20333-20336/tcp
EXPOSE 30333-30336:30333-30336/tcp

RUN \
  apt-get update && \
  apt-get install -y software-properties-common && \
  echo oracle-java8-installer shared/accepted-oracle-license-v1-1 select true | debconf-set-selections && \
  add-apt-repository -y ppa:webupd8team/java && \
  apt-get update && \
  apt-get install -y oracle-java8-installer && \
  rm -rf /var/lib/apt/lists/* && \
  rm -rf /var/cache/oracle-jdk8-installer

# Newly added for comileing .py to .avm
RUN \
 # python3 -m venv venv &&\
 # source venv/bin/activate &&\
 # pip install -r requirements.txt 
  apt-get update && apt-get install -y \
  python3-pip

ENV JAVA_HOME /usr/lib/jvm/java-8-oracle

ADD files/ files/ 