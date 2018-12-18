#!/bin/bash

                
#echo 'What version do you want to roll back to?'

#read version

#this will read our text file that is maintaining the current version folder we are in

b=1
while read p;do
        echo "$p"
	let b=$p-1
done <versionNumber.txt

#by default b is 1, after the while loop it will roll back to the second last version
echo "$b"


scp ~/version$b/mainpage.php yik@192.168.2.3:/var/www/html

