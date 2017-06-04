'''Jakob Gray, getTime, 5/17/17
Accesses Google Maps' distance matrix API and gets the distance between two locations in real time.
This time is rounded to the upper minute and then written to a file.
Outpuf File: results.txt'''

import json
import urllib
from time import localtime, strftime
import datetime
import MySQLdb

# Returns rounded traffic value
def getTime():
    url = ('https://maps.googleapis.com/maps/api/distancematrix/json?'
    'origins=%227417%20Gillingham%20Row,%20Alexandria,%20VA%22&'
    'destinations=%228280%20Greensboro%20Dr.%20Suite%20150%20McLean,%20VA%2022102%22&'
    'mode=driving&'
    'departure_time=now&'
    'units=imperial&'
    'traffic_model=best_guess&'
    'key=AIzaSyDDFucaPy6a3hbiCEt-xiBMZz9TjVeEzMk')

    response = urllib.urlopen(url)
    data = json.loads(response.read().decode('utf-8'))
    traveltime = data['rows'][0]['elements'][0]['duration_in_traffic']['value']
    return traveltime/60


# -----Desired Values-----
traffic = getTime()
currentTime = strftime("%Y-%m-%d %H:%M:%S", localtime())
# ------------------------

# Write to text file
# target = open("/home/jakob/Projects/Googlemaps/results2.txt","a+")
#trafficstr = (str) traffic
#target.write(trafficstr + " " + currentTime + "\n")
# target.close()

# Connect to database
conn = MySQLdb.connect(host="localhost",
					user="mgs_user",
					passwd="pa55word",
					db="maps")

x=conn.cursor()


# x.execute("""SELECT * FROM times WHERE traffic=25;""")
# print(x.fetchall());
try:
	x.execute("""INSERT INTO times VALUES (%s,%s)""",(currentTime, traffic))
	conn.commit()
except:
	conn.rollback()

conn.close()