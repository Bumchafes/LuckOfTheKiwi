import java.io.*;
import java.sql.Array;
import java.util.Arrays;
import java.util.Collections;
import java.util.HashMap;
import java.util.Random;

public class winnerSelection
{
    public static void main(String[] args) 
    {     
        HashMap<Integer,Integer> ticketUniqeID = new HashMap<Integer,Integer>();
        int amountOfTIckets = 10;
        int ticketNumber = 1;
        for (int i = 0; i < amountOfTIckets; i ++)
            {
                for(int n = 0; n < 1; n++)
                    {
                        Random rand = new Random();
                        int rngNumber = rand.nextInt(1000000) + 1;
                        rngNumber += (rngNumber * ticketNumber / 2);
                        rngNumber += (rngNumber * ticketNumber / 3);
                        rngNumber += (rngNumber * ticketNumber / 4);
                        rngNumber += (rngNumber * ticketNumber / 5);
                        // ticketsSold[0][0] = ticketNumber;
                        // ticketsSold[0][1] = rngNumber;
                        ticketUniqeID.put(ticketNumber, rngNumber);
                        // System.out.println(Arrays.deepToString(ticketsSold));
                        ticketNumber += 1;                         
                    }
             }
        
        System.out.println("Generating Tickets ... ");
        System.out.print("Tickets: ");
        System.out.println(Collections.singletonList(ticketUniqeID));
        System.out.println("");
        System.out.println("Generating Winning Ticket ... ");
        
        while(ticketUniqeID.size() > 1)
            {
                Random rand = new Random();
                int rngNumber2 = rand.nextInt(10)+1;
                if((rngNumber2 < 1) || (rngNumber2 > 10))
                    {
                        rngNumber2 = rand.nextInt(10)+1;
                    }
                else
                    {
                        ticketUniqeID.remove(rngNumber2);
                    }
            }

        System.out.print("Winning Ticket: ");
        System.out.print(Collections.singletonList(ticketUniqeID.keySet())); 
        System.out.println(" Public Key: "+ Collections.singletonList(ticketUniqeID.values()));
        System.out.println("");
        System.out.println("Congratulations!");
    }
}
