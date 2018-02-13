
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>

#include "btlib.h"

int connWBC(char message[] ){

    int network_socket; //stores socket integer
    network_socket = socket(AF_INET, SOCK_STREAM, 0); //0 default tcp protocol

    struct sockaddr_in server_address; //create structure for address
    server_address.sin_family = AF_INET; //set family of address / type of address
    server_address.sin_port = htons(9002); //translates port into something interperatable
    server_address.sin_addr.s_addr = INADDR_ANY; //sets the ip address in sturcture sin_addr

    int connect_status = connect(network_socket, (struct sockaddr *) &server_address, sizeof(server_address)); //casts server_address(pointer) to structrure

    if( connect_status == -1){ //returns -1 when error, therefore this handles error
        printf("something went wrong with the connection");
    }

    char server_response[256];

    recv(network_socket, &server_response, sizeof(server_response), 0); //recieve data from server

    printf("Server responce: %s\n", server_response); //print server response

    close(network_socket); //close socket

    return 0;

}