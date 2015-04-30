#!/bin/bash

# zip the local MAMP child theme folder
# must run deploylocal.sh first

zip -r /Applications/MAMP/htdocs/xpatnation/wp-content/themes/src.zip src -x ".*" -x "*/.*"