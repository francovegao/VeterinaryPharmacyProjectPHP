<?php

# Make sure to :
# 1. Edit the studentName and studentID
# 2. Edit the page's meta author and title
# 3. Edit the page's main heading to use the static member
# 4. Complete the listReservations(), addReservationForm() and editReservationForm()

class Page  {

  

    static function header()   { ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="">
                <title>Luiz's Page</title>   
                <link href="css/stylesA.css" rel="stylesheet">     
            </head>
            <body>
                <header>
                <h1></h1>
                </header>
                <article>
    <?php }

    static function footer()   { ?>
        <!-- Start the page's footer -->            
                </article>
            </body>

        </html>

    <?php }


    static function listReservations(Array $reservations, array $tickets)    {
    ?>
       
        <section class="main">
        <h2>Current Data</h2>
        <table id="list">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                 
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Ticket Class</th>
                    <th>Cost</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </thead>
            <?php

                //List all the reservations
                $i=0;
                foreach($reservations as $reservation)  {
                    // make sure to use the correct tr class
                    // echo "<tr class=
                    
                    // ... Write your code ...
                    if($i % 2 == 0){ // even row
                        echo "<tbody class=\"evenRow\">";
                    }
                    else{
                        echo "<tbody class=\"oddRow\">";
                    }

                    
                    echo "<tr>";
                    echo "<td>{$reservation->getReservationID()}</td>";
                    echo "<td>{$reservation->getEmail()}</td>";
                    echo "<td>{$reservation->getAmount()}</td>";
                    
                    $matchingTicket = null;
                    foreach ($tickets as $ticket) {
                        if ($ticket->getID() === $reservation->getTicketClassID()) {
                            $matchingTicket = $ticket;
                            break;
                        }
                    }
                    
                    if ($matchingTicket) {
                        echo "<td>{$matchingTicket->getTicketDetail()}</td>";
                    } else {
                        echo "<td>N/A</td>"; // or any default value if no matching ticket is found
                    }
                    if ($matchingTicket) {
                        $ticketCost = $matchingTicket->getTicketCost();
                        $cost = $ticketCost * $reservation->getAmount();
                        $formattedCost = number_format($cost, 2, '.', ',');
                        echo "<td>\${$formattedCost}</td>";
                    }
                    //echo "<td>{$reservation->getTicketCost()}</td>";
                    echo "<td><a href={$_SERVER['PHP_SELF']}?action=edit&reservationid={$reservation->getReservationID()}>Edit</a></td>";
                    echo "<td><a href={$_SERVER['PHP_SELF']}?action=delete&reservationid={$reservation->getReservationID()}>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                } 
        
        echo '</table>
            </section>';
  
    }

    // this function displays the add new reservation record
    // $rooms is the array of rooms objects obtained from the RoomsTypeDAO
    // $rooms is required to display the rooms option
    static function createReservationForm(Array $ticketClass)   {    
        ?> 
        <!-- Start the page's add entry form -->
     

    // This function is to show the edit reservation record form
    // The edit form should be displayed only when the Edit link is clicked
    // Whether you will display add form or edit form should be controlled in the main file.

    // The $reservationToEdit is a singleResult record of reservation whose link was clicked
    // The $ticketClass contains the array of ticket objects from the TicketClassDAO
    static function editReservationForm(Reservation $reservationToEdit, Array $ticketClass)   {  
        // Make sure the form's method is pointing to $_SERVER["PHP_SELF"]
        // and it is using post method
    }
    <?php
    }

}