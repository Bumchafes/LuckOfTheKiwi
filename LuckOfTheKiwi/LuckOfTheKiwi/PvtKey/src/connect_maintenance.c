int connect_maintenance() {

  //Create a socket
  int network_socket;
  network_socket = socket(AF_IN, SOCK_STREAM, 0);
  
  //Specify socket address
  struct sockaddr_in server_address;
  server_address.sin_family = AF_INET;
  server_address.sin_port = htons(9002);
  server_address.sin_addr.s_addr = inet_addr("maintenance");
  
  int connection_status = connect(network_socket, (struct sockaddr *)&sever_address, sizeof(server_address));
  
  // check for error with the connection
  if (connection_status == -1){
    printf('Shit's fucked up, doc');
  }
           
  // recieve data from the server
  char server_response[256];
  recv(network_socket, &server_response, sizeof(server_response), 0);
  
  // print out the server's response
  printf("The server sent out the data: %s\n", server_response);
           
  // and then close the socket
  close(sock);
  
  return 0;
}
