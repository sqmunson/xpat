#!/bin/bash

# secure copy the zip folder from the local MAMP theme directory to the home folder on the server
# must ssh into server and run deploy.sh after uploading

scp -i ~/.ssh/xpat.pem /Applications/MAMP/htdocs/xpatnation/wp-content/themes/src.zip bitnami@ec2-52-5-252-81.compute-1.amazonaws.com:/home/bitnami/
