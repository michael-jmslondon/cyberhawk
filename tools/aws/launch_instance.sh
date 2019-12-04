#!/bin/bash

aws ec2 create-security-group --group-name CyberSecurityGroup --description "Security Group for simple Cyber site"
aws ec2 authorize-security-group-ingress --group-name CyberSecurityGroup --protocol tcp --port 22 --cidr 0.0.0.0/0
aws ec2 authorize-security-group-ingress --group-name CyberSecurityGroup --protocol tcp --port 80 --cidr 0.0.0.0/0
aws ec2 describe-security-groups --group-names CyberSecurityGroup


aws ec2 create-security-group --group-name CyberSecurityGroup --description "Security Group for simple Cyber site" --vpc-id vpc-a57a8dc0
aws ec2 authorize-security-group-ingress --group-id sg-04525ce8d8a59ee1e --protocol tcp --port 22 --cidr 0.0.0.0/0
aws ec2 authorize-security-group-ingress --group-id sg-04525ce8d8a59ee1e --protocol tcp --port 80 --cidr 0.0.0.0/0


aws ec2 describe-images --owners amazon --filters 'Name=name,Values=amzn2-ami-hvm-2.0.????????.?-x86_64-gp2' 'Name=state,Values=available' --query 'reverse(sort_by(Images, &CreationDate))[:1].ImageId' --output text


aws ec2 run-instances  --image-id ami-028188d9b49b32a80 --key-name JmsTestServer --security-group-id sg-04525ce8d8a59ee1e  --subnet-id subnet-efa05298 --instance-type t2.micro  --count 1 --user-data file://userdata.sh

