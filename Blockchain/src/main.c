
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>

#include "btlib.h"

int main() {
 
  for(;;){
    connWBC("message");
    sleep(60);
  }

  return 0;
}

