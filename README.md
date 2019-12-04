# cyberhawk

Basic site to be found at index.php.

Slightly better site at indexajax.php though this does use jquery which not sure if violates the no framework rule.

Tools/aws contains a userdata file for the setup of a simple aws server and checks out and runs apache to host it. There is also a small file with the commands for AWS CLI to launch the instance once you've setup CLI. Couple of issues with some commands in that my AWS account is pre default VPC so need to specify the subnet etc. 

Next steps:

Other display options? 
	Information seems to be of a fail case issue so showing % success in pie/bar chart might be more useful as overall health of the system. Issue maybe in case of low error rates could have display problems.
