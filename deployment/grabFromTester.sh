#!/bin/bash


#we grab the folder from deploy, then a folder named version#, 

#scp -r GaryCastillo@192.168.1.21:~/Desktop/test/ ~/ #grab the folder from Deploy

#scp -r nithin@192.168.2.7:~/Desktop/html/ ~/ #puts into my / , this takes the whole folder.

#scp -r nithin@192.168.2.7:~/Desktop/mainpage.php ~/

scp denion@192.168.2.12:/var/www/html/mainpage.php ~/


a=1 #set counter to 1 so that it will check if a version1 folder exists, if it doesnt we create that folder
while :
do


        if [ ! -d "version$a" ];    then
                echo "version$a directory does not exist, so we use it"
                mkdir -p version$a

		echo "$a" > versionNumber.txt #this maintains the version number of folder we last create

                #cp ~/test/* ~/version$a #test would be the name of the folder from Development/Tester. Here we copy the CONTENTS OF THE folder we got from scp and place THE CONTENTS into the version folder we created.

		cp mainpage.php ~/version$a #this will put the file we took and put in a folder with the correct version

		

		scp ~/version$a/* nithin@192.168.2.7:/var/www/html #Here we grab the CONTENTS INSIDE THE version# folder we created and send it to QA.


		#cp ~/test/* ~/test3



		#This should effectively replace the QA's backend with the updated backend folder from tester.


		#ssh GaryCastillo@192.168.1.21 #log into QA

		#cd Desktop/version$2/test && ./try #Run the 


                break
        else
                echo "version$a directory did exist, so we will check next version"
                let "a=a+1"
        fi

done



