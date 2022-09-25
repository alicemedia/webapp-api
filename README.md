# webapp-api 
API for Webapp

by Alice Media 2022

# Install

Unzip content in a PHP 7.4 compatible server.

# Configs

Open dbConfig.php to modify the database paramaters.

# Use

##login.php

Expects:
-	['email'] <=email of user
-	['password'] <=Password encrypted in MD5

Returns :  
-	['token'] <=Security token that will be added to all the requests 

##register.php

Expects:
-	 [‘followers’]['first_name']
-	 [‘followers’]['last_name']
-	 [‘followers’]['email']
-	 [‘followers’]['password']
-	 [followers’]['dob']
-	 [followers’]['month']
-	 [followers’]['year']
-	 [followers’]['phone']
-	 [followers’]['address']
-	 [followers’]['ville']
-	 [followers’]['province']
-	 [followers’]['code_postal']
-	 [followers’]['country']

-	 Returns :  
-	['id'] User ID

##request_event.php (User requests event.)

Expects:
-	[‘followers’][‘id’] <=ID of user
-	['event']['date']
-	['event']['price']
-	['event']['location']
-	['guest']['user_id']

Returns :  
-	['token'] <=Security token that will be exchanged while the event is created, updating the event status (only if reply=true)

##invite_influencer.php

Expects:
-	 [‘influencers’]['first_name']
-	 [‘influencers’]['last_name']
-	 [‘influencers’]['email']
-	 [‘influencers’]['password']
-	 [influencers’]['dob']
-	 [influencers’]['month']
-	 [influencers’]['year']
-	 [influencers’]['phone']
-	 [influencers’]['address']
-	 [influencers’]['ville']
-	 [influencers’]['province']
-	 [influencers’]['code_postal']
-	 [influencers’]['country']

-	 Returns :  
-	['id'] User ID

##get_ticket.php

Expects:
-	 [‘followers’][‘id’] <=ID of user
-	 [‘events’]['event_id’] 
-	 [‘influencers’]['id']

-	Returns :  
-	['ticket_id'] <=ID of ticket

##get_profile.php (Returns profile information for a specified user)

Expects:
-	[‘follower’] <= ID of user

Returns :  
-	[‘followers’]['first_name']
-	 ['followers']['last_name']
-	 [‘followers’]['email']
-	 [‘followers’]['picture_path'] 
-	 [‘followers’][ 'experience']
-	 [‘followers’]['dob']
-	 [‘followers’]['phone']
-	 [followers’]['address']
-	 [followers’]['ville']
-	 [followers’]['province']
-	 [' followers’]['code_postal']
-	 [‘followers’]['country']

##get_event.php (Returns detailled information for a specified event)

Expects:
-	['event'] <= ID of event

Returns :  
-	[‘events’]['id'] <= ID of event
-	['events']['date']
-	['events']['time']
-	['events'] ['name']
-	['events'] ['location']
-	['events'] ['price']
-	['influencers'] ['alias']

##event_check.php (Returns the status of a specified event)

Expects:
-	 [‘events’]['id'] <= ID of event

Returns :  
-	['status'] <= ID of event
-	['tickets'] ['ticket_sold'] <=number of tickets sold

##guest_list.php (Returns an array with the tickets ID of each guest for a specified event)

Expects:
-	 [‘events’]['id'] <= ID of event

Returns :  
-	[‘events’]['id'] 
-	[‘events’][ ['status'] 
-	{['tickets'] ['ticket_id']} <=ID of each tickets sold

##ticket_check.php (Returns detailed guest information for a specified ticket)

Expects:
-	 ['ticket'] <= ID of ticket

Returns :  
-	[' tickets'] ['status']
-	[' tickets'] [date']
-	[‘followers’]['first_name']
-	[‘followers’]['last_name']
-	[‘followers’]['email']
-	['events']['date']
-	['events']['time']
-	['events'] ['name']
-	['events'] ['location']
-	['events'] ['price']
