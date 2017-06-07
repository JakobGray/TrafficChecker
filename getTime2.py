'''Jakob Gray, getTime, 6/4/17

Accesses Google Maps' distance matrix API and gets the travel time between two locations in real time.
Sends values to a database for presenting with chart.php
'''

# Imports
import json
import urllib
from time import localtime, strftime
from datetime import datetime
import MySQLdb

# Returns traffic value in minutes
def getTime():
    url = ('https://maps.googleapis.com/maps/api/distancematrix/json?'
    'origins=%228280%20Greensboro%20Dr.%20Suite%20150%20McLean,%20VA%2022102%22&'
    'destinations=%227417%20Gillingham%20Row,%20Alexandria,%20VA%22&'
    'mode=driving&'
    'departure_time=now&'
    'units=imperial&'
    'traffic_model=best_guess&'
    'key=AIzaSyDDFucaPy6a3hbiCEt-xiBMZz9TjVeEzMk')

    response = urllib.urlopen(url)
    data = json.loads(response.read().decode('utf-8'))
    traveltime = data['rows'][0]['elements'][0]['duration_in_traffic']['value']
    return traveltime/60.0    #converting to minutes


# -----Desired Values-----
traffic = getTime()
currentTime = strftime("%Y-%m-%d %H:%M:%S", localtime())
# ------------------------

# Write to text file - used initally
# target = open("/home/jakob/Projects/Googlemaps/results2_reverse.txt","a+")
# trafficstr = str(traffic)
# target.write(trafficstr + " " + currentTime + "\n")
# target.close()

# Connect to database
conn = MySQLdb.connect(host="localhost",
					user="mgs_user",
					passwd="pa55word",
					db="maps")

x=conn.cursor()

dayofweek = datetime.weekday(datetime.today())

try:
    if (dayofweek == 0):
        x.execute("""INSERT INTO monday_reverse VALUES (%s,%s);""",(currentTime, traffic))
        conn.commit()
    elif (dayofweek == 1):
        x.execute("""INSERT INTO tuesday_reverse VALUES (%s,%s);""",(currentTime, traffic))
        conn.commit()
    elif (dayofweek == 2):
        x.execute("""INSERT INTO wednesday_reverse VALUES (%s,%s);""",(currentTime, traffic))
        conn.commit()
    elif (dayofweek == 3):
        x.execute("""INSERT INTO thursday_reverse VALUES (%s,%s);""",(currentTime, traffic))
        conn.commit()
    elif (dayofweek == 4):
        x.execute("""INSERT INTO friday_reverse VALUES (%s,%s);""",(currentTime, traffic))
        conn.commit()
    elif (dayofweek == 5):
        x.execute("""INSERT INTO saturday_reverse VALUES (%s,%s);""",(currentTime, traffic))
        conn.commit()
    elif (dayofweek == 6):
        x.execute("""INSERT INTO sunday_reverse VALUES (%s,%s);""",(currentTime, traffic))
        conn.commit()

except:
    conn.rollback()

conn.close()