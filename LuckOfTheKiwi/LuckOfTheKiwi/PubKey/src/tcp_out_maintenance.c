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
  
  return 0;
}
